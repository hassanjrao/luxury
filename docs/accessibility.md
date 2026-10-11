# Accessibility work — 11 October 2026

This work improves the public site toward WCAG 2.2 AA. A zero automated violation count does not establish complete WCAG conformance or ADA compliance. Media accessibility and assistive-technology checks still require review.

## GitHub and production comparison

The original GitHub revision was `fc6d4e798a721fb4698f2e66dd5a958ab59e0c0f`. The production directory `/home/dh_wdpk6q/modernluxurybuilders.com` initially had no Git checkout.

Comparison of all 228 tracked paths, allowing CRLF/LF line-ending differences, found 223 matching files, four differing files and one missing editor configuration file. The differing files were `index.php`, `script.js`, `lightbox/src/css/lightbox.css` and `contact.php`. The server also contained `.htaccess`, two favicons and the extra images `images/new_image.png` and `images/inspiration/11.jpg`.

Revision `b799793` preserves the production page content, JavaScript and lightbox stylesheet, both extra images and `.htaccess`. GitHub's original `contact.php` was empty. Its working production version was preserved privately at `/home/dh_wdpk6q/.modernluxurybuilders-contact.php` with mode 600. The new public controller validates fields, retains entries after errors and calls that existing delivery handler. Mail credentials were not added to Git.

The original public PHP pages, JavaScript, lightbox stylesheet and `.htaccess` are backed up at `/home/dh_wdpk6q/.modernluxurybuilders-backup-4W1EYT/site-before-accessibility.tgz`. Git metadata is outside the web root at `/home/dh_wdpk6q/.modernluxurybuilders-git`; the site directory contains its Git pointer, so ordinary `git pull --ff-only origin main` works there. HTTP access to the Git pointer, editor configuration, tests and documentation is denied.

## Changes

- Shared named navigation, a skip link and one main landmark and main heading per public page.
- Native menu button, announced expansion, Escape handling and keyboard focus on section navigation.
- Visible focus, readable overlays, underlined text links, larger gallery controls and responsive layouts.
- Gallery descriptions based on reviewed image thumbnails. A native modal viewer provides previous/next controls, position announcements, focus containment and focus restoration.
- Off-screen carousel slides are excluded from keyboard focus. Carousels do not advance automatically and honor reduced motion.
- The Vimeo hero uses its player controls and no automatic playback; native property videos are named and do not autoplay.
- Shared contact forms use persistent labels, autocomplete and associated error messages. Server validation preserves entries, focuses the summary and prevents raw delivery errors from being displayed. Success messages receive focus after anchor navigation finishes.
- Existing production content and the current mail integration are retained.

## Local verification

| Check | Result |
| --- | --- |
| Desktop at 1280 × 720 | All 11 public pages: HTTP 200, no axe violations or script errors, one main heading, no horizontal overflow |
| Mobile at 375 × 812 | All 11 public pages: same checks passed |
| Reflow at 320 × 800 | All 11 public pages: same checks passed |
| Keyboard and interactive states | 11 behavior checks and four open-state axe audits passed |
| Delivery integration fixtures | Five checks passed: success redirect, returned error, thrown error, escaped validation values and safe redirect target |
| PHP and JavaScript syntax | Passed |

The homepage and a service-page template also passed a 200% root-font-size check at the mobile viewport. This supplements the viewport reflow checks; it does not replace testing browser zoom and text enlargement with assistive technology.

Production testing identified a leading newline before the contact controller's PHP opening tag, which could prevent redirects when output buffering was disabled. The newline was removed and the delivery fixture checks passed with buffering disabled. Outcome redirects now target the error or success summary directly, and focus does not wait for embedded media to finish loading.

Tests never send live contact messages. Invalid live submissions exercise server validation; valid live submissions are blocked by the browser harness. The success-message check uses the existing `mailsend` display state and does not establish email delivery. Delivery fixtures use a local stub. Images are served directly from the checkout only during local tests; live tests request actual production assets.

## Reproduce

Use Node.js 18 or newer, PHP and Chrome. Set `CHROME_PATH` if Chrome is installed elsewhere.

```powershell
npm ci --ignore-scripts
New-Item -ItemType Directory .audit-artifacts/php-sessions -Force
php -d session.save_path=.audit-artifacts/php-sessions -S 127.0.0.1:8100
```

In another terminal:

```powershell
npm run test:a11y
npm run test:a11y:mobile
node tests/accessibility.cjs --reflow
node tests/accessibility.cjs --mobile --text-enlarged
npm run test:a11y:keyboard
```

To use production, set `$env:ACCESSIBILITY_BASE_URL='https://modernluxurybuilders.com'` before these commands. Results are in `.audit-artifacts`, with `live-` filenames for production. Reports retain violations, manual-review items and resource failures. Generated reports and screenshots are ignored by Git.

To test delivery integration without sending mail, start a separate local PHP server with `$env:MODERN_LUXURY_CONTACT_HANDLER=(Resolve-Path tests/fixtures/contact-handler.php).Path` on port 8101 and `-d output_buffering=0`, then run `npm run test:contact`. Use a writable PHP session directory. Do not point the delivery fixture tests at a server configured for real mail.

## Remaining review

- Both native property videos contain audio. Accurate captions, transcripts and necessary audio descriptions have not been verified or authored. Review the Vimeo hero and the linked YouTube announcement as well. Do not add empty or invented caption tracks to obtain a passing score.
- Test the actual Vimeo player controls and caption settings. The outer-page axe scan flags the embedded frame for separate review.
- Check screen-reader navigation, announcements, 200% text enlargement and full error recovery with assistive technology. The keyboard checks use Chrome automation.
- Review every axe `incomplete` item. Image-backed overlays use white text on 80% or 85% black backgrounds, but axe cannot always calculate their contrast. Confirm readability across the underlying images/video.
- Live message delivery was preserved but not exercised with an email during this task.

Technical reference: [W3C WCAG overview](https://www.w3.org/WAI/standards-guidelines/wcag/).

## AccessibilityChecker scan

1. Sign in to your AccessibilityChecker account using the previously supplied signup/account link. No account or subscription was created during this task.
2. Add `https://modernluxurybuilders.com` and select the available WCAG 2.2 AA scan. Follow any domain-verification requirements and check the selected plan's page coverage.
3. Include the homepage and all ten related service/article pages linked in the footer. Test expanded menus, galleries and form-error states where the service supports interactive scans.
4. Review failures and manual items, rerun after corrections, and save the dated report with the deployed Git revision. A homepage-only automated score does not cover the complete site or its media.
