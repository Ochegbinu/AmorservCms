This content management system is built with the latest version of Laravel for interview assessment. To use the application, you can follow the steps below.

1. Clone the app to your system
2. cp the .env file
3. set up your MySQL database
4. run migrations
5. Run the following command to seed data ::
   
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=EditorUserSeeder
php artisan db:seed --class=PermissionsTableSeeder
php artisan db:seed --class=RolesTableSeeder

7. serve the application by running php artisan serve
8. also run 'npm run dev' to compile and build the frontend assets
9. the application has two users, the admin, and the editor

   Admin login details: Email:: admin@example.com
                       password:: password
   register on the web by clicking the register button from the home page to register the new user as an editor

   Editor Login Details: Email:: editor1@example.com
                           Password:: password

   
