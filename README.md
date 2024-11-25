**ReadMe**

After downloading the repository, follow the following steps to complete the setup

**Step 1**

Create the domain for LPTA by editing the hosts file

``sudo gedit /etc/hosts``

add the line below to the file

``127.0.0.1:8080 eritlpta.test``


**Step 2**

Build the application by running the code 

``docker compose build``

Then run

``docker compose up -d``


**Step 3**

Test the application on the browser, open a browser and enter the following urls 

``localhost::8080``

``127.0.0.1:8080``

``eritlpta.test:8080``

See if the application login shows


**Step 4**

Copy the database file to docker

Navigate to the location of the files downloaded and run the command below

``docker cp ./nigenius.sql erit-lpta-docker-mysql-1:/tmp/dump.sql``


**Step 5**

Navigate into the mysql docker server

``docker exec -it erit-lpta-docker-mysql-1 -u root -p``

Enter mysql password which is "root"

When in the mysql console, check the databases available

``show databases;``

if you see the database *ci3db*, go ahead and run the database dump copied

``source /tmp/dump.sql``





