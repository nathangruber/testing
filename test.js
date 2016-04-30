var Github = require('github-api');

var github = new Github({
 token: "9d957c4663e0d45c0ef12a980d68dd74c79d0be7",
 auth: "oauth"
});


var repo = github.getRepo('nathangruber', 'testing');

var options = {
 author: {name: 'Nate', email: 'grubernp@gmail.com'},
 committer: {name: 'Nate', email: 'grubernp@gmail.com'},
 encode: true // Whether to base64 encode the file. (default: true)
};

// repo.write('master', 'README.md', 'THIS IS ONLY A TEST', 'testing again', options, function(err) {});

//repo.read('master', 'README.md', function(err, data) {
    //console.log(err);
    //console.log(data);
//});

repo.contributors(function(err, data) {
	console.log(data);

});



//repo.collaborators('master', 'javascript.html', function(err, data) {
   // console.log(err);
    //console.log(data);

//});

