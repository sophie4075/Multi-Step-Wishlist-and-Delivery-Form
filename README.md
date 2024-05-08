Wishlist Application
This application allows users to create wishlists by entering their desires along with delivery details. It is designed as a simple PHP-based application that implements a three-step form process where users first enter their wishes, then add delivery details, and finally view a confirmation page.

Features
- Enter Wishlist: Users can enter up to three wishes. The input is checked for special characters and appropriate length.
- Enter Delivery Details: After successfully entering wishes, users can input their delivery details.
- Confirmation Page: A final review and confirmation of the data entered.
- Validation: The form validates inputs using regular expressions, including checking whether postal codes are five digits and ensuring no prohibited special characters are used.
- Dynamic Pages: Depending on the status of the form entry, different pages are generated.

Technologies
- PHP: All server-side logic is handled with PHP, utilizing sessions for state management.
- HTML/CSS: Used for the frontend design.
