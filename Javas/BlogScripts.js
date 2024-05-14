/*
document.body.innerHTML = document.body.innerHTML + ("Last modified: " + document.lastModified);
*/
Path file = Paths.get("https://raw.githubusercontent.com/WernerDJ/sample_website/main/pages/BlogPost_Inteligencia-libertad.html");
BasicFileAttributes attr = Files.readAttributes(file, BasicFileAttributes.class);
document.body.innerHTML = document.body.innerHTML + ("lastModifiedTime: " + attr.lastModifiedTime());
