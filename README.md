# jobs.at coding exercise

We're happy you applied for a job as frontend web developer at jobs.at :)
Before you can get started at jobs.at, we have a small exercise for you where you can show us your skills
as full-stack web developer.

## Exercise notes

1. Based on the exercise requirements, the home page loads only the most recent jobs (the ones which were published within last week). If you want to see all of them please adapt the `index` function in the `JobController.php` file accordingly, the necessary code is already in place ;)

2. The credentials for the Login page are the following:

```
Username: admin
Password: Pa$$w0rd!
```

3. The `/admin` route is not protected as it wasn’t required in the exercise, normally this page would be protected by a middleware.

4. I configured **BrowserSync** in the project to work a bit faster since this plugin applies the frontend changes and refresh the page automatically.

5. If a job ad is marked as inactive in the databse (taken by an applicant), the UI for that particular job would look like this:

![localhost_3000_](https://user-images.githubusercontent.com/1477503/146680433-d2bf0e22-cf69-4548-9980-e0e93ab5a34b.png)


## Webapp screenshot

![jobs-at-coding-exercise](https://user-images.githubusercontent.com/1477503/146680195-fe67887e-013c-4a0c-84e0-e1e228f0a058.jpg)


## Exercise description

At jobs.at we obviously have to deal a lot of with jobs, companies and people who are looking for a job.
Thus, this coding challenge will also have to do with our main topic :) 

We want you to create a small web app where the user can find jobs he/she is interested in. Moreover, there should
be the possibility to publish a new job for an admin user and make it available to potential candidates. 
The next section outlines the specific task we want you to do.
If you cannot complete all the tasks, don't mind to send us the results you have. We'll discuss the coding challenge
at the second interview with you together.  

## Tasks to be done 

1. The home page should initially show a list of all recent jobs (the ones which were published within last week).
   The `index.blade.php` is the home page which contains a dummy 
   `Home.vue` component as starting point for you.

   Following information should be displayed:
   * Title of the job.
   * Name of the company the job belongs to.
   * Description of the job.
   * Location.
   * Date and Time the job was published (format: yyyy-MM-dd HH:mm:ss)

   A job can either be active or inactive if taken by an applicant. As a user I want to see visually which job is active
   and which one inactive. Think about how this can look in the UI and implement it.
   
At the bottom of this section there is a link to a UI-Mockup, which shows you how the layout of the small web-app 
should approximately look like. 

2. An input field should be provided where the user can search for a job by its title. As the user keeps typing
the list of jobs should be adapted immediately based on the search pattern. The filtering should be done solely on the client
side in order to provide a good user experience. The project setup contains [Vue.js](https://vuejs.org) 
which should be used to build the filtering feature on the client side.

3. According to the proposed UI mock-up (see bottom of this section), additional filter options should be provided to the user. Firstly, he/she should
be able to narrow down the search results based on the selected locations shown in the sidebar. All locations from the available jobs should be selectable in the sidebar.
As you have all jobs with all attributes present on the client, you don't have to load anything extra but do the work on the client side.   

4. Secondly the user should also be able to search for jobs from specific companies. Therefore, add the available companies
as selectable options in the sidebar. All companies from the database should be shown in the sidebar.
These should be loaded via a separate HTTP request. You can use the [axios HTTP client](https://github.com/axios/axios), 
which is already included in the project and registered on the `window` object. So you can use it right away.
The endpoint to load the companies can be accessed with `/companies`. You can find the definition in the `web.php` if you want to inspect it.    
If the user selects a company, only the jobs which belong to this company should be shown in the list.

For all the filter options, the list in the UI should automatically update without a page refresh.

5. There should be a link on the home page, called "Add new job ad", which brings the user to a new page where he/she first needs
to provide a password to confirm that he/she is an admin user. If the user types in the correct password a form is shown where he/she can enter a new job ad.
If the password was incorrect, an error should be shown and the user should not get redirected to the next page with the form.
You are not required to follow any security best practices like you would have to do in a real productive app. You can simply
hard-code the admin password and compare against it in the frontend. This means, you don't have to do a request to the backend to validate it.   

On the target page with the form there should be according input fields for title, description and location of the job as well as a dropdown list with the
available companies. When the user fills in all the data and hits the "Save" button, a new job should be saved to the database 
and the user should get redirected to the home page with the full list of jobs afterwards. All the attributes of the job 
are mandatory and if the user tries to submit an incomplete form, an error should be shown.

Here is a UI mockup of the home page to give you a hint about the layout. 
[UI-Mockup](https://drive.google.com/open?id=1LNf1n1k8JtmjdAwx_k5vEwj4Cc1WZ37v)

## Project Setup

In order to get you started quickly we have created a basic project setup for you. It uses the PHP web framework [Laravel](https://laravel.com),
which we also use at jobs.at for our projects. It gives you a great starting point to prototype a web app with PHP, Vue, HTML, CSS and JavaScript. 

## Requirements to run this project
If you have PHP, composer and Node installed on your machine can skip the the following two steps and continue with the
next section. 

1. Make sure you have installed PHP.

   On Windows you can use [WAMP](http://www.wampserver.com/en/).
   On Mac OSX we recommend installing PHP via [Homebrew](https://brew.sh/index_de). Just execute `brew install php`.
   On Linux (Ubuntu) you can use `sudo apt-get install php`.
   Check your installation with `php -v`.

2. Install composer (the package manager for PHP)

   [Download and install](https://getcomposer.org/download/)
   If you are n Mac OSX you can also use `brew install composer`.
   Check you installation with `composer --version`.

## Startup the project

Now, you are already setup to run this project for the first time. 

1. Get the playground to your machine by either
   * Forking the repository into your github account (preferred).
   * If for whatever reason you do not have a Github account run `git clone https://github.com/jobs-at/coding-exercise-frontend.git coding-exercise` to clone the repository to your machine.
2. Run `cd coding-exercise` to change to the project folder.
3. Run `composer install` to install all PHP dependencies.
4. Copy the content of `.env.example` to `.env` file.
5. Run `php artisan key:generate` to generate the necessary application key which will be put automatically into you `.env` file. 
6. Run `php artisan serve` to startup the development server.
7. Open [http://localhost:8000/](http://localhost:8000/) in your browser.

## Frontend development

The frontend build requires you to have Node installed. If you do not yet have Node installed, you can download and 
install it from [here](https://nodejs.org/en/download/). On MacOSX you can use `brew install node` as well.
Check your installation with `node -v` which should print the current node version. 

Now run 

1. `npm install` to install all frontend dependencies. 
2. `npm run watch` to build the frontend and make it watching your files for any changes.
This process will automatically detect any changes to frontend resources like Vue SFC, HTML, SCSS and JS so that you only have
to reload your browser window after a change.

## Database

In order to make the user experience more realistic the project uses a MySql database to store the jobs and companies
needed to complete the exercise. You therefore need to start a MySql database on your computer. 

If have MySql installed on your machine, add a new database called `coding-exercise`. The default user
for this project is `root` with an empty password. If you want to use a different mysql user, change the config in your
`.env` file.

If you don't yet have MySql installed, you can download it from [here](https://dev.mysql.com/downloads/mysql/) and follow the instructions.
If you are on Mac, you can install it via `brew install mysql` or on Linux (Ubuntu) via `sudo apt-get install mysql-server` for instance.

## Job and company sample data

We have created database migrations and a seeder for you to build up the database quickly.
It also populates it with sample data (jobs and companies) so you do not have to manually enter any test data from scratch.

Simply execute `php artisan migrate:fresh --seed` to migrate the database and fill it with data.

After that you can connect to your database and check whether there is a `jobs` and a `companies` table with fake data.
The data consists of 30 random jobs and 3 companies whereby each of them having assigned 10 jobs.
Info: You do not have to pay attention to the `migrations` table. 

## A few more tips before you start

Make sure you have started up the Laravel Development Server with `php artisan serve`.
I recommend running `npm run watch` which automatically refreshes you frontend resources like HTML (Blade), Vue (.vue), JS and SCSS when something changes.
As a result you just need to refresh your browser window and can inspect your changes.
If some change is not reflected in the browser you may have to rerun `npm run watch` at some point but this should actually
be the exception. 

The project already contains the necessary models `Job.php` and `Company.php` (you can find them in the `app` folder)
with the attributes from the database. Behind the scenes an OR mapper ([Eloquent](https://laravel.com/docs/8.x/eloquent)) uses these Model classes to ease the communication
with the database. An HTTP controller named `JobController.php` is provided which responds with the home page and provides all jobs from the database to the frontend. 
They are automatically provide as a prop to the `Home.vue` component so that you can use it right away in the frontend.
As mentioned earlier there is also the endpoint to load all the companies and return them as JSON to the frontend. You can use this endpoint to do the AJAX request to fetch all companies.
Tip: The [Laravel documentation](https://laravel.com/docs/8.x) and the [Vue.js documentation](https://vuejs.org/v2/guide/) will help you along the way as they have a very thorough documentation.

Regarding the frontend, following things should be considered:
* The project includes the UI toolkit [bootstrap](https://getbootstrap.com/) which might
be helpful when layouting and styling your page. Feel free to use them if you want. In order to enable them, you
only have to comment in the CSS file in the `index.blade.php`.
* We do not expect a fancy UI design but keep mobile-first and responsiveness in mind when layouting the pages.

## How to submit
You should send your submission to [juergen.ratzenboeck@jobs.at](mailto:juergen.ratzenboeck@jobs.at?subject=[jobs.at Coding Challenge Submision])
at latest five hours before the second interview so that I can take a look at it in advance.

The preferred option is to send us a link to the forked repository in your Github account.
If you do not have one, please send us your result either as ZIP archive or by sharing a link to some other cloud service
where you have stored it. 

If you have any questions do not hesitate to contact us.

We are already curious about your results.

Happy coding :)
