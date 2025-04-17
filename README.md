# Elementor Vertical Accordion

A simple, lightweight Elementor widget that adds a fully responsive **vertical accordion** to any page. Organize content into collapsible sections with ease—no extra plugins required.

---

## Project Overview

This project provides a custom **Elementor widget** for WordPress that displays a vertical accordion. Each accordion panel can contain any Elementor content (text, images, shortcodes, etc.) and is fully responsive out of the box. Styling is handled via a separate CSS file so you can adjust colors, spacing, and typography to match your theme.

---

## Key Features

- **Vertical Accordion Layout**  
  Clean, modern accordion panels stacked vertically.
- **Elementor-Native**  
  No shortcodes or external plugins—just drag & drop within Elementor.
- **Responsive Design**  
  Works seamlessly on mobile, tablet, and desktop.
- **Custom Styling**  
  Separate CSS file allows easy tweaks to colors, fonts, and spacing.
- **Lightweight & Dependency‑Free**  
  Minimal footprint—no extra JavaScript libraries needed.

---

## Installation

1. **Copy the widget folder**  
   Place the `elementor` folder into your theme (or child theme) at:
   wp-content/themes/your-theme/

2. **Register the widget in `functions.php`**  
Add this code to your theme’s `functions.php`:
```php
add_action('init', function () {
    require_once get_stylesheet_directory() . '/elementor/widgets/vertical-accordion/vertical-accordion-widget.php';
    \Elementor\Plugin::instance()->widgets_manager->register( new VerticalAccordion_Widget() );
});
```
3. **Edit in Elementor**
Open any page with Elementor.
Search for “Vertical Accordion” in the widget panel.
Drag it onto your canvas and add as many panels as you like.

4. **Edit in Elementor**
Open any page with Elementor.
Search for “Vertical Accordion” in the widget panel.
Drag it onto your canvas and add as many panels as you like.

## Screenshot

![acc_screen](https://github.com/user-attachments/assets/665c05c4-f5bb-4b5d-b96a-5f4a55b53c50)


## License
MIT License © 2025

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the “Software”), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
