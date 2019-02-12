const array=[{name:'Vaibhav',nick:'VD',},{name:'Harsh',nick:'HD',},{name:'Shivam',nick:'SD',}];
let findPersonIndex=function(arr,name){
	const index=arr.findIndex(function(a,i){
		return a.name.toLowerCase()===name.toLowerCase();
	})
	return index;
}
let findPerson=function(arr,name){
	const per=arr.find(function(a,i){
		return a.name.toLowerCase()===name.toLowerCase();
	})
	return per;
}
console.log(array[findPersonIndex(array,'shivam')]);
console.log(findPerson(array,'vaibhav'));