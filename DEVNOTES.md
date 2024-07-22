---------------------- JOB REQUIREMENTS ---------------------

Summary:
The job is to make a registration database for a fishing guild.
The users ought to be able to log in, log out and register their fish and delete them when they don't have them anymore. The administator needs to be able to create and delete users in the database. There needs to be an authentication feature that automatically sends the new users an email to change their password. Each member needs to be able to register their own fish records and be able to see them in their own profile workplace. Each member also needs to be able to see an overview of all the records of all members. The admin(s) can also delete all posts by all users.

-------ROLES-------
ADMIN:
-   Superuser
-   Create & delete users & send automatic authentication email
-   Create & delete dropdown menus for users
-   Can delete registrations for any reason
-   CRUD operations for user table + registrations

USER:
-   CRUD operations for table entries
-   View overview of all registrations from all users
GUEST:
-   Needs to contact an admin to aqcuire an account


-------PROGRESS-----
TO DO:
-   The lidnr column needs to be formatted like: "000320" and needs to increment per new user from the right side of the column. So for example the next user of 000320 becomes 00321 and the next one 00322, etc.
- Each user needs a table in their profile workplace that has all of their own records and the option to create and delete records of their own.
- Every table needs to be searchable and sortable by name.
- Beheerder aka superuser needs to be the only one able to grant
    access to a new registration
- Superuser needs to send out an email automatically with confirmation
    that the account has been created -> the new user needs to change
    the current (temporary) password, which needs to be strong and hashed. User needs to change their password every year and get notified of that
-   import existing excel table into DB
-   streamlined profile with table of own registrations, statistics
    and profile options (edit/delete account) + registration pages

DONE:
- Website styling
- Make new migration for a new schema called "Visregistratie"
- Fish migration now has the following columns: id (foreignId from User migration), lidnr, geslachtsnaam, soortnaam, vangplaats, AS    (aquariumstam), KV (kweekvorm) and lastly a note column.
- Made authentication functionality
- Made admin controller page functions and tables
- Joined 2 tables so data from 2 separate tables displays on the URL.
- Admin is the only one who can add options to the registrations
- Made password reset through email functionality
- Forgot password functionality
- Made the tables searchable and sortable -> bug


