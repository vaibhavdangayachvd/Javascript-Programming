let vaibhav={
	name:'Vaibhav',
	age:20,
	weight:58,
}
let harsh={
	name:'Harsh',
	age:20,
	weight:58,
}
let shivam={
	name:'Shivam',
	age:20,
	weight:58,
}
let vishal={
	name:'Vishal',
	age:20,
	weight:58,
}
let persons=new Map();
persons.set('vd',vaibhav);
persons.set('hd',harsh);
persons.set('sa',shivam);
persons.set('vk',vishal);
for(const [nick,person] of persons.entries())
	console.log(`${nick}-->${person.name}`);