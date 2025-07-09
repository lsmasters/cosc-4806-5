This assignment is a continuation of Assignment 4 which is also in Github.

To conform with my password rules, I could not use the admin/admin combination so
	LOGIN:            admin
              PASSWORD:  Admin123$
Assignment 5
•	Update all header and footers. Look at other websites and see what is normally in those. Don't forget there are two headers (public/private)  
A third header file was added for Administrator access only.
•	Implement some components from Bootstrap (toasts, alerts, different nav, etc. See this: https://getbootstrap.com/docs/5.0/components)
•	Create an admin user (username: admin, password: admin) *** see above ***
•	Once logged in, they can run various reports at /reports (hint: that's the controller name).  The administrator’s dashboard has 1. A summary of users:  active, inactive, and new,  2.  A summary of site access in the last 30 day, and 3.  A summary of the top 5 users with the highest number of reminders.  There is also a tab for Users listing all users with the date of the last login and the number of logins for this month.  The second tab lists all the reminders by each user giving the administrator the option to edit or delete the reminder. 
o	View all reminders;  a tab under administrator access.
o	Who has the most reminders;  summarized under the administrator tab: reminders
o	How many total logins by username/user page gives last login by user and total logins by user: ;  summarized under the administrator tab: users  
o	Bonus: Implement a chart!  Administrator’s dashboard has line and bar graph.
•	Update header to include new menu item (only for admin user):  implemented
•	Put in ACLs that do not allow a non-admin user and non-logged-in users to view the page:  ACL handled through access restrictions in the header files
•	All of the above will earn you 8/10. The last two can be earned by 1. Make your site look really good (CSS) without any errors. 2. Implement charts for the admin view. It's okay to use an existing JS library.
	

Lessons Learned:  This was challenging because of all the small pieces/requirements:
1.	Make one change at a time and commit it to github. Know when to take a break and go back to your last success.
2.	Error detection can be very challenging in php.
3.	File paths and routing became a BIG issue at times. Variables were sometimes an issue between model and view.
4.	Spent too much time on the Administrator’s dashboard page and did not have time to make the pages pretty.
Known issues:
1.	 Much documentation is missing because I ran out of time.
2.	 Home/Exit from the administrator’s section is wonky and inconsistent.  Did not have time to sort it out

