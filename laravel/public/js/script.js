
var main = function(){
	$('form').submit(function(event){
		var $input = $(event.target).find('input');
		var comment = $input.val();

		if (comment != ""){
			var html = $("<li>").text(comment);
			html.prependTo('#comments');
			$input.val("");
		}
		return false;
	});
}

main()

//test document

console.log("hello worls")
var book = {
	"title":"java script",
	"author": {
		"first_name": "cbrom",
		"last_name": "abody"
	},
	"date": new Date().toString()
};

var x = new Object(book);
console.log(x.title)
for (p in book){
	console.log(p);
}