import card from "./card-image.twig";
import cardImage from "./card-image.yml";

/**
 * Storybook Definition.
 */
export default { title: "Molecules/Cards/card-image" };

export const cardimage = () => card(cardImage);