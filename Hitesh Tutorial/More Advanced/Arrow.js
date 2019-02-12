//Create a tudo with 6 objects using filter to get things not done. Print only title of the job to do. 
const myTudos=[{name:'Play',done:false},{name:'Eat',done:false},{name:'Read',done:false},
			 {name:'Talk',done:true},{name:'Walk',done:true},{name:'Sleep',done:true}];
let find_not_done=function(tudos){
	const not_done=tudos.filter((tudo)=> tudo.done===false)
	not_done.forEach((nd)=>console.log(`You have not done : ${nd.name}`))
}
find_not_done(myTudos);