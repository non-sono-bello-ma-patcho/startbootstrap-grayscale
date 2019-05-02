import {library, dom} from '@fortawesome/fontawesome-svg-core';
import {
    faUser,
    faUserCog,
    faCog,
    faStar,
    faMinusCircle,
    faSearch,
    faBars,
    faMobileAlt,
    faEnvelope,
    faMapMarkedAlt,
    faShoppingCart
} from '@fortawesome/free-solid-svg-icons';

import {
    faStar as faStarReg
} from '@fortawesome/free-regular-svg-icons';

import {
    faInstagram,
    faGithub
} from '@fortawesome/free-brands-svg-icons';
library.add(
    // solid
    faUser,
    faUserCog,
    faCog,
    faStar,
    faMinusCircle,
    faSearch,
    faBars,
    faMobileAlt,
    faEnvelope,
    faMapMarkedAlt,
    faShoppingCart,

    // regular
    faStarReg,

    // brand
    faInstagram,
    faGithub
);

dom.watch();