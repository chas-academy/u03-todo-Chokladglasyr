# Xmas List  

Here is my design in [Figma](https://www.figma.com/design/HFj4q35xjuHdruXLuH8rHB/U03?node-id=0-1&t=6om5Lk0hxoBU4ifD-1/?target="_blank")  

In another page on the shared Figma you can find the ER diagrams, however, I tried 3 different types, whereas one is on another site. So here is the [third](https://drawsql.app/teams/hej-8/diagrams/ida) version.

Conclusion: I think i preferred the [drawsql](https://drawsql.app/teams/hej-8/diagrams/ida) since I could assign more specifics to it, the downside is I have to share a link. I can screenshot too, but through the link you can even assign specifics like 'unsigned'. I like the look of it too.

---------------------------
## Get started  

1. Clone the repository from [GitHub](https://github.com/chas-academy/u03-todo-Chokladglasyr).
2. Make sure your Docker Desktop is open.
3. Run ```docker compose up --build``` in your terminal/code editor (within the repository). There is a seed file that will run and create tables and a kind of [superuser](#superuser).
4. Open up "localhost" in your browser and you should now see the web application.  


-------------------  

[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/5k4uDUDX)
  
-------------------  

# The Idea
My idea is to make a To do list inspired by the christmas spirits! 

You will be able to create different, predefined lists, but also create a custom list. Even if you chosen to create a predefined list, it will still be editable. The predefined lists will also include predefined "tasks", these cannot be edited but can be deleted to create new "tasks".  
[Retro](#retro)

The different lists with different titles/themes are:  
+ Where to go ([Event List](#event-list))
+ What to buy ([Groceries](#groceries))
+ Who to gift ([Gift List](#gift-list))
+ What to eat ([Dinner List](#dinner-list))
+ What to bake ([Dessert List](#dessert-list))
+ Where to decorate ([Decorations List](#decorations-list))  

With the different tasks for each list:  

# Event List
+ Julmarknad Gamla Stan
+ Nobel Week Lights
+ Lucia i storkyrkan
+ Barnens Lucia på förskolan
+ Julbord med jobbet

# Groceries
+ smör
+ ägg
+ ljus sirap
+ vetemjöl
+ saffran

# Gift List 
+ Mamma
+ Pappa
+ Mormor
+ Morfar
+ Svärfar

# Dinner List
+ Janssons frestelse
+ Julskinka
+ Julköttbullar
+ Kokt julkorv
+ Prinskorv

# Dessert List
+ Chokladkola
+ Lussebullar
+ Pepparkakor
+ Mintkyssar

# Decorations List
+ Pynta altan
+ Klä julgranen
+ Ta fram adventsljustakar 
+ Ljusslinga på balkongen
+ Krans på dörren

# Superuser  
username: admin  
pw: admin  
  
----------------------------------
# Retro
In my figma design I had a logging out page, I skipped that because I felt it was needed.  
While doing the webapp I realized it would be good with some "pop up" messages when something went wrong with logging in or signing up. Same goes for when a user was created, things I didn't think off when designing.  
The list with tasks looks different too because my design wasn't so easily implemented with PHP, so I changed it up abit.  
I kind of regret using pictures in the background but now they are there, and yes with a waterstamp.  
I tried to do many commits, naming things with a little more thought behind it but of course these are still things I feel I need to practice. Naming variables, functions and etc and using issues on GitHub instead of scribbling notes on what I have to fix.  
But overall I'm quite satisfied with my accomplishment.  It looks good enough and the CRUD functions I believe is slightly more than good enough! And that's it for me!