var data = [];
d3.json('data.php',function(dataset){
  //Itterate through data and push data into array
  for(key in dataset){
    data.push(dataset[key].miles)
  }

  //margin convention for d3js *google*
  var margin = {top:30, right:30 , bottom:40 , left:30 }

  var height = 400 - margin.top - margin.bottom,
      width = 430 - margin.left - margin.right,
      barWidth = 50,
      barOffset = 5;

  //for transition
  var tempColor;

  //Scales y axis data
  var yScale = d3.scale.linear()
            .domain([0,d3.max(data)])
            .range([0,height - 200]);

  //Scales x axis data
  var xScale = d3.scale.ordinal()
            .domain(d3.range(0,data.length ))
            .rangeBands([0,width],.1);

  //Changes bar colors
  var colors = d3.scale.linear()
            .domain([0,data.length])
            .range(['#7f8c8d','#ecf0f1']);

  //Chart propeties
  var myChart = d3.select('#chart').append('svg')
      .attr('width',width + margin.left + margin.right)
      .attr('height',height + margin.top + margin.bottom)
      .style('background','#34495e')
      .append('g')
      .attr('transform','translate(' + margin.left +', '+ margin.top + ')')
      .selectAll('rect').data(data)
      .enter().append('rect')
              .style('fill',function(d,i){
                  return colors(d)
              })
              .attr('width',xScale.rangeBand())
              .attr('height',0)
              .attr('x',function(d,i){
                  return xScale(i);
              })
              .attr('y',height)
              .on('mouseover',function(d){
                  tempColor = this.style.fill;
                  d3.select(this)
                    .transition()
                    .style('fill','#e74c3c')
              })
              .on('mouseout',function(d){
                  d3.select(this)
                    .transition()
                    .style('fill',tempColor)
              })
    myChart.transition()
      .attr('height',function(d){
          return yScale(d)
       })
      .attr('y',function(d){
          return height - yScale(d);
       })
      .delay (function(d,i){
          return i * 20;
      })
      .duration(2000)
      .ease('elastic')

      myChart.select("#chart")
       .data(data)
       .enter()
       .append("text")
       .text(function(d) {
            return d;
       })
       .attr("x", function(d, i) {
            return i * (width / data.length) + 5;  // +5
       })
       .attr("y", function(d,i) {
            return height + 20              // +15
       })
       .attr("font-family", "sans-serif")
       .attr("font-size", "11px")
       .attr("fill", "white");

})