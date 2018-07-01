var myCanvas = document.getElementById("myCanvas2");
myCanvas.width = 130;
myCanvas.height = 130;

var ctx = myCanvas.getContext("2d");//ссылка на холст
function drawLine(ctx, startX, startY, endX, endY){
    ctx.beginPath();//ссылка на контекст рисунка
    ctx.moveTo(startX,startY);//координата X начальной точки линии
    ctx.lineTo(endX,endY);// координата Y начальной точки линии
    ctx.stroke();//координата Y конечной точки линии
}

function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.stroke();
}

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(centerX,centerY);
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fill();
}


var myVinyls = {
    "Classical music": 10,
    "Alternative rock": 14,
    "Pop": 2,
    "Jazz": 12
};
var Piechart = function(options){
    this.options = options;
    this.canvas = options.canvas;
    this.ctx = this.canvas.getContext("2d");
    this.colors = options.colors;

    this.draw = function(){
        var total_value = 0;
        var color_index = 0;
        for (var categ in this.options.data){
            var val = this.options.data[categ];
            total_value += val;
        }

        var start_angle = 0;
        for (categ in this.options.data){
            val = this.options.data[categ];
            var slice_angle = 2 * Math.PI * val / total_value;

            drawPieSlice(
                this.ctx,
                this.canvas.width/2,
                this.canvas.height/2,
                Math.min(this.canvas.width/2,this.canvas.height/2),
                start_angle,
                start_angle+slice_angle,
                this.colors[color_index%this.colors.length]
            );

            start_angle += slice_angle;
            color_index++;
        }

        if (this.options.doughnutHoleSize){
            drawPieSlice(
                this.ctx,
                this.canvas.width/2,
                this.canvas.height/2,
                this.options.doughnutHoleSize * Math.min(this.canvas.width/2,this.canvas.height/2),
                0,
                2 * Math.PI,
                "#ffffff"
            );
        }

    }
}
var myDougnutChart = new Piechart(
    {
        canvas:myCanvas,
        data:myVinyls,
        colors:["#fde23e","#f16e23", "#57d9ff","#937e88"],
        doughnutHoleSize:0.8
    }
);
myDougnutChart.draw();