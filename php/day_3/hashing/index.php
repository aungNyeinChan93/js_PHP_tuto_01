<?php

$my_password = "aungnyeinchan@123";
$my_array = [1,2,3,4,5];

$hash_password = password_hash($my_password,PASSWORD_BCRYPT);
$hash_password2 = password_hash($my_password,PASSWORD_ARGON2I);

echo $hash_password ."<br>"; //$2y$10$fuM2ZOSyMXEpbcGtrC67EeZUqPxIU9zaWa38oRcubuPBRB5OMtvXe
echo $hash_password2."<br>"; //$argon2i$v=19$m=65536,t=4,p=1$RFdabkZCODlaQ1J2L2lWTg$efDTC95Qh9eOdDkZtdtXJiChonzekVs/QO2t3xmRseI
#hash_password_string has been chaning when refresh!

if(password_verify($my_password,$hash_password)){
    echo "<h1>Password Same!</h1>";
}else{
    echo "<h1>Password Wrong!</h1>";
}

