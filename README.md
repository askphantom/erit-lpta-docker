**ReadMe**

After downloading the repository, follow the following steps to complete the setup

**Step 1**

create the somain for LPTA by editing the hosts file

``sudo gedit /etc/hosts``

add the line below to the file

``127.0.0.1 eritlpta.test``

**Step 2**

copy the database file to docker

navigate to the location of the files downloaded and run the command below

``docker cp ./nigenius.sql erit-lpta-docker-mysql-1:/tmp/dump.sql``

