import React from "react";
import { Link } from "@inertiajs/inertia-react";

export const MainButton = ({ link, text, transparent }) => {
  return (
    <Link href={link}>
      <button
        className={transparent ? "main_button transparent" : "main_button"}
      >
        {text}
      </button>
    </Link>
  );
};

export const MainButtonSubmit = ({ link, text, transparent }) => {
    return (
            <button
                className={transparent ? "main_button transparent" : "main_button"}
                type={"submit"}
            >
                {text}
            </button>
    );
};
