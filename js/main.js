var myName = "Neeti Solutions";

var red = [0, 100, 63];
var orange = [40, 100, 60];
var green = [75, 100, 40];
var blue = [26, 11, 32];
var purple = [280, 50, 60];

var teal=[245,245,220];
var temp=[0,0,0];
var letterColors = [red, orange, green, blue, purple];
//var letterColors = [blue, purple];
drawName(myName, letterColors);

if(10 < 3)
{
    bubbleShape = 'square';
}
else
{
    bubbleShape = 'circle';
}

bounceBubbles();
