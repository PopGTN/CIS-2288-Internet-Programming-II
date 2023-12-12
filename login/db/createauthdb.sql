/* create the database */
drop database if exists DB2288;
create database if not exists DB2288;
use DB2288;
create table external_users
(
    custUser varchar(20),
    custPass varchar(40),
    primary key (custUser)
);
/* MySQL sha1() function calculates an SHA-1 160-bit checksum for a string. */
insert into external_users values ('siteAdminAccount', sha1('CISpass'));

/* Next line creates a ‘non-root’ user in MySQL
   This user will have select, insert, update, delete privileges
   We will use this user in our activity
 */
grant select, insert, update, delete on DB2288.* to 'web_only_user'@'localhost' identified by 'web_secret_password';
/*For changes to take effect immediately flush the privileges*/
flush privileges;
