import Vue from "vue";
import Card from "./Card.vue";
import Child from "./Child.vue";
import Button from "./Button.vue";
import Checkbox from "./Checkbox.vue";
import { HasError, AlertError, AlertSuccess } from "vform";
import "@fortawesome/fontawesome-free/css/all.css";

// Components that are registered globaly.
[Card, Child, Button, Checkbox, HasError, AlertError, AlertSuccess].forEach(
  (Component) => {
    Vue.component(Component.name, Component);
  }
);
