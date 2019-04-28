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
    faMapMarkedAlt
} from '@fortawesome/free-solid-svg-icons';

import {
    faInstagram,
    faGithub
} from '@fortawesome/free-brands-svg-icons';
library.add(
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

    // brand
    faInstagram,
    faGithub
);

dom.watch();