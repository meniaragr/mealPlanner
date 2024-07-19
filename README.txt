In the folder project:
open terminal and launch: 
composer install
go phpmyadmin and create db with same name as in .env
import the database from the project folder
Edit .env file. Go to line 27 and replace the root:root with your credential


### Before you start doing anything else:

### Ensure Local Repository is Up-to-Date:

git checkout master
git pull origin master

### Update  Branch with Latest Changes from Master:

git checkout branch-name
git merge master

### Each one should work on one different twig file to avoid conflict.

### When finished and commit changes:

### Push Changes to the Remote  Branch:

git push origin branch-name

### Create a pull request on GitHub, to merge the feature branch into the master branch. I will approve it and deal with conflict if any