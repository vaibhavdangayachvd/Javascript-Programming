let dice=function(){
	let upper=6;
	let lower=1;
	return(Math.floor(Math.random()*(upper-lower))+lower)
}
console.log(dice());