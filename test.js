/*var Github = require('github-api');

// set the information your need to use the api
var username = "<github";
var reponame = "<github-repository>";
var email = "<github-user-email>";
var author = "<github-name>";

// https://github.com/settings/tokens
var oauthToken = "9d957c4663e0d45c0ef12a980d68dd74c79d0be7";

//create instance wrapper
var github = new Github({
    'token' : oauthToken,
    'auth' : "oauth"
});

//create repo object
var repo = github.getRepo(nathangruber, testing);

//set options
/*var options = {
 'author' : {'name': author, 'email': email},
 'committer' : {'name': author, 'email': email},
 // encode: true // Whether to base64 encode the file. (default: true)
}

//set the changes you want to make
var branchToModify = 'master';
var fileToModify = 'test.js';
var fileContents = 'Data has been written here.';
var commitMsg = 'API call was succesful!';

//write the changes to github
//repo.write('master', 'README.md', '# testingrepo', 'api call was successful', options, function(err) {});
repo.show(function(err, repo) {});
console.log(err);
console.log(repo); 
*/
///////////////////////////////////
var Github = require('github-api');

var github = new Github({
 token: "144d5a2a8a46e3bdbc20ae1f2c6fe2673f472f5f",
 auth: "oauth"
});


var repo = github.getRepo('scottjparker21', 'test');

var options = {
 author: {name: 'Scott', email: 'scottjparker21@gmail.com'},
 committer: {name: 'Scott', email: 'scottjparker21@gmail.com'},
 encode: true // Whether to base64 encode the file. (default: true)
}
// repo.write('master', 'README.md', 'THIS IS ONLY A TEST', 'testing again', options, function(err) {});
repo.read('master', 'README.md', function(err, data) {
    console.log(err);
    console.log(data);
});