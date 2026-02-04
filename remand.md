# Project Remand

This document summarizes the medi_project repository (client-side), provides setup/run instructions, lists the corrections made, and suggests next steps.

**Project Overview**
- **Name:** Medicine Plus (medi_project)
- **Location:** repository root (this file)
- **Main client entry:** client_side/home_page.php
- **Admin area:** admin_side/
- **DB / PHP helper:** database/collaction.php

**Prerequisites**
- XAMPP (Apache + PHP) on Windows
- MongoDB server accessible to PHP (the project uses MongoDB)
- Composer (already bundled vendor exists but useful for updates)

**Quick Setup (Windows / XAMPP)**
1. Place the `medi_project` folder under `C:/xampp/htdocs/` (already present according to workspace).
2. Start Apache (and MongoDB if running separately).
3. Ensure PHP's MongoDB extension is installed and enabled in `php.ini`.
4. Verify `database/collaction.php` contains the correct MongoDB connection settings for your environment.
5. Open in browser:
   - Client site: http://localhost/medi_project/client_side/home_page.php
   - Admin site: http://localhost/medi_project/admin_side/dashboard.php

**What I fixed (client-side)**
- **Header include:** replaced a fragile include with `require_once '../../database/collaction.php'` in `client_side/include/header.php` so DB helper loads correctly when included from client pages.
- **SCSS removal:** removed a browser-includable SCSS link from the header (browsers can't parse SCSS files).
- **Navigation CSS:** removed invalid `background:blur` declaration in `client_side/include/navigation.php` and normalized background color.
- **Footer scripts ordering:** in `client_side/include/fotter.php` loaded a modern jQuery CDN before Owl Carousel, removed duplicate/misnamed local jQuery, and used a valid Bootstrap bundle CDN.
- **Asset path fixes:** corrected duplicated `client_side/` in image paths in `client_side/home_page.php` so image references resolve correctly.
- **Cart/session and JS fixes:** in `client_side/cart.php` moved `session_start()` before any output, added `data-unit-price` to each item row, and updated JavaScript to compute item totals from unit price (prevents incorrect arithmetic and division by zero).

**Files touched**
- client_side/include/header.php
- client_side/include/navigation.php
- client_side/include/fotter.php
- client_side/home_page.php
- client_side/cart.php

**Notes & Recommendations**
- Implement `update_cart.php` (AJAX endpoint) to update session quantities server-side — currently the front-end calls it but it may be missing.
- Scan remaining PHP files for relative path inconsistencies (includes, assets). A small script or manual pass helps.
- Secure inputs: sanitize GET/POST data and use CSRF protection for forms.
- Consider bundling or serving local copies of third-party libs (jQuery, Owl, Bootstrap) for offline stability.
- Keep `vendor/` up to date via Composer when dependencies change.

**Next Steps I can do for you**
- Full repo scan for other broken includes/paths and fix them.
- Implement `update_cart.php` to persist cart changes to PHP session.
- Add a small health-check script that confirms DB connectivity and required PHP extensions.

If you want me to proceed with a repo-wide scan or implement `update_cart.php`, tell me which you'd prefer and I'll add it to the todo list and start. 

**Installing PHP MongoDB extension (Windows / XAMPP)**

If your environment does not yet have the PHP MongoDB extension enabled, follow these steps to install the `mongodb` extension DLL and enable it in XAMPP's PHP:

1. Determine your PHP version and architecture used by XAMPP:
   - Create a `phpinfo.php` file in `C:/xampp/htdocs/medi_project/` with the content `<?php phpinfo();` and open it in the browser (http://localhost/medi_project/phpinfo.php).
   - Note the PHP version (e.g., 8.1.x), Thread Safety (TS or NTS), and architecture (x86/x64).

2. Download the correct `mongodb` DLL from PECL/Windows builds:
   - Visit https://pecl.php.net/package/mongodb or the Windows PECL builds at https://windows.php.net/downloads/pecl/releases/mongodb/ and choose the release that matches your PHP version, architecture, and thread-safety (TS/NTS).
   - Download the ZIP that contains `php_mongodb.dll` (the file may be named `php_mongodb.dll` in the download; when copied to `ext` it will be referenced as `mongodb.dll` by some instructions — keep the DLL filename as provided, typically `php_mongodb.dll`).

3. Copy the DLL into XAMPP's PHP extension folder:
   - Extract the downloaded ZIP and copy the DLL file into `C:/xampp/php/ext/`.

4. Enable the extension in `php.ini` used by Apache:
   - Open `C:/xampp/php/php.ini` (or the `php.ini` shown by your `phpinfo()` under "Loaded Configuration File").
   - Add the line (or uncomment if present):

     extension=php_mongodb.dll

   - If you copied a file named `mongodb.dll`, use `extension=mongodb.dll` instead. Make sure the name matches exactly.

5. Restart Apache via the XAMPP Control Panel.

6. Verify the extension is loaded:
   - Re-open `phpinfo.php` and search for "mongodb" or check `php -m` from the command line to see `mongodb` listed.

Troubleshooting tips
 - Use the exact DLL that matches PHP major/minor version, architecture, and thread-safety. Mismatched DLLs will cause Apache to fail to start.
 - If Apache fails to start after enabling the extension, check `C:/xampp/apache/logs/error.log` and Windows Event Viewer for startup errors.
 - If you prefer command-line installation (on systems with pecl available), you can run `pecl install mongodb`, but on Windows it's usually simpler to download the prebuilt DLL.

After the extension is enabled and `phpinfo()` shows `mongodb`, `database/collaction.php` should be able to connect to MongoDB as configured.
