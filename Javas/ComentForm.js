let emailAddress = "";
do {
emailAddress = prompt("Enter a valid email address:");
if (emailAddress === null) {
break;
}
}
while (!emailAddress.includes("@"));
