# Application for Navigus Round 2 (Documentation)

We were asked to create a web application with primarily these features:
* Presence of basic Registration and Login System
* Feature to view online/active users
* Feature to display user information on hovering on user's avatar
* Feature to view access logs with timestamp of users
* The above 2 special functionalities should be visible to only specific accounts.

## Welcome Page
This page lists all the top level features of the application.
![](/media/index.png)



## Registration Page
When user hits the Register button, the followin form shows up.
![](/media/register.png)



## Login Page
Once the user finishes registration, user can click on Login and the followin form shows up.
![](/media/login.png)


## Dashboard
When user successfully logs in, a redirection to "dashboard.php" takes place.
![](/media/dashboard.png)



## Seeing Online/Active Users
This functionality allows **specific users** to see the currently active users on the website.
Only administrators are allowed to view the Active Users. When a normal user tries to access this page, the following screen pops up.
![](/media/online_users_for_others.png)

When you are logged in as admin using those admin credentaials, the following details show up.
![](/media/online_users_for_admin.png)


### Hover on User's avtar
If the user hovers on the avatar of a user, additional details like Full Name and Email are displayed.
![](/media/hover.png)


## Seeing Access Logs of Users
Like the active user functionality, this feature also requires administrator account. 
This allows the privileged account to see which users logged in at which time. If a normal user tries to access this page, he gets the following message.
![](/media/access_logs_for_others.png)

If the admin credentails are used, the following details are displayed.
![](/media/access_logs_for_administrator.png)


## A word about security
This project has been designed by keeping security in mind. All user input is sanatized using PHP functions so the application is not vulnerable to many cyber attacks. The application has been tested multiple times.


# Summary:
I have tried to implement all the features demanded by Navigus. Kindly Note that folling are the administrator credentials which can be used for viewing online users and access logs:

Email: ```admin@navigus.com```


Password: ```admin```

**This project is created by Shashank Barthwal**
