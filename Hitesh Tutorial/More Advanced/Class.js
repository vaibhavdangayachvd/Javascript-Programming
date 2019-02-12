class details
{
	constructor(first,last)
	{
		this.first=first;
		this.last=last;
	}
	show_full_name()
	{
		if(this.first === undefined && this.last === undefined)
			console.log(`Name is not set`);
		else
			console.log(`${this.first} ${this.last} is your name.`);
	}
};
const a=new details();
a.show_full_name();
const b=new details('Vaibhav','Dangayach');
b.show_full_name();