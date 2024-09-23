The objective of this project is to create a multi-regional demo web application that operates using "subfolders".
The links to the "subfolders" must be implemented dynamically, meaning that routes should not be explicitly defined.

## Structure:
- Main Page
    - Header
        - Displays the currently selected city
    - Content
        - Lists all cities retrieved from the HH API.
        - Each city is a link to its corresponding "subfolder".
        - The selected city is highlighted in the list.
- About Us Page
    - Header
        - Displays the currently selected city.
    - Content
        - Contains placeholder text (Lorem ipsum).
- News Page
    - Header
        - Displays the currently selected city.
    - Content
        - Contains placeholder text (Lorem ipsum).

## Requirements:
- When user clicks on one of the listed cities, the application should remember the selected city.
- When user visits the base URL (i.e. without a city prefix), the application should redirect the user to the corresponding "subfolder".

## Starting the Application:
```sh
git clone --depth=1 https://github.com/neumb/location-redirect-demo
```

```sh
composer i
```

```sh
php artisan migrate
```

```sh
php artisan app:pull-areas
```

```sh
php artisan serve
```
