import Trianglify from 'trianglify';

import '../scss/error.scss';

console .log('initializing trianglify');
let pattern = Trianglify({
    cell_size: 75,
    variance: 0.75,
    x_colors: ['rgba(255, 255, 255, 0.1)', 'rgba(255, 255, 255, 1)'],
    stroke_width: 0.2,
    width: window.innerWidth,
    height: window.innerHeight
});


let svg = $(pattern.svg());

svg.addClass('gradient').addClass('gradient-overlay');
$('body').append(svg);



