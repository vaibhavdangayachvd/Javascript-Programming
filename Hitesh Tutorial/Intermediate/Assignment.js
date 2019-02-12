let grade_calc=function(marks,tot)
{
	if(marks>90)
		console.log(`A Grade`);
	else if(marks>80)
		console.log(`B Grade`);
	else if(marks>70)
		console.log(`C Grade`);
	else if(marks>60)
		console.log(`D Grade`);
	else if(marks>50)
		console.log(`E Grade`);
	else
		console.log(`Fail`);
	let per=(marks/tot)*100;
	console.log(`Your percentage is ${per}%`);
}
grade_calc(92,100);