import {library, dom} from '@fortawesome/fontawesome-svg-core';
import {faUser} from '@fortawesome/free-solid-svg-icons/faUser';
import {faUserCog} from '@fortawesome/free-solid-svg-icons/faUserCog';
import {faCog} from '@fortawesome/free-solid-svg-icons/faCog';
import {faStar} from '@fortawesome/free-solid-svg-icons/faStar';
import {faMinusCircle} from '@fortawesome/free-solid-svg-icons/faMinusCircle';
import {faSearch} from '@fortawesome/free-solid-svg-icons/faSearch';
import {faBars} from '@fortawesome/free-solid-svg-icons/faBars';
import {faMobileAlt} from '@fortawesome/free-solid-svg-icons/faMobileAlt';
import {faEnvelope} from '@fortawesome/free-solid-svg-icons/faEnvelope';
import {faMapMarkedAlt} from '@fortawesome/free-solid-svg-icons/faMapMarkedAlt';
import {faShoppingCart} from '@fortawesome/free-solid-svg-icons/faShoppingCart';
import {faRocket} from '@fortawesome/free-solid-svg-icons/faRocket';
import {faCode} from '@fortawesome/free-solid-svg-icons/faCode';
import {faSlidersH} from '@fortawesome/free-solid-svg-icons/faSlidersH';
import {faSort} from '@fortawesome/free-solid-svg-icons/faSort';
import {faFileUpload} from '@fortawesome/free-solid-svg-icons/faFileUpload';
import {faCircleNotch} from '@fortawesome/free-solid-svg-icons/faCircleNotch';
import {faHeart} from '@fortawesome/free-solid-svg-icons/faHeart';

import {faStar as faStarReg} from '@fortawesome/free-regular-svg-icons/faStar';
import {faHeart as faHeartReg} from '@fortawesome/free-regular-svg-icons/faHeart';

import {faInstagram} from '@fortawesome/free-brands-svg-icons/faInstagram';
import{faGithub} from '@fortawesome/free-brands-svg-icons/faGithub';

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
    faRocket,
    faCode,
    faSlidersH,
    faSort,
    faFileUpload,
    faCircleNotch,
    faHeart,

    // regular
    faStarReg,
    faHeartReg,

    // brand
    faInstagram,
    faGithub
);

dom.watch();