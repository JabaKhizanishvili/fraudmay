import React, { useState } from "react";
import { MainButton, MainButtonSubmit } from "../Button/MainButton";
import "./Form.css";
import { usePage } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

export const FormBox = ({ imgSrc }) => {
    return (
        <div className="form_box">
            <div className="img">
                <img src={imgSrc} alt="" />
            </div>
            <Form />
        </div>
    );
};

export const Form = () => {
    const inputs = [
        {
            placeholder: "Name",
            type: "text",
        },
        {
            placeholder: "Surname",
            type: "text",
        },
        {
            placeholder: "Phone number",
            type: "tel",
        },
        {
            placeholder: "email address",
            type: "text",
        },
    ];
    const { errors } = usePage().props;

    const [values, setValues] = useState({
        name: "",
        surname: "",
        phone: "",
        email: "",
        message: "",
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();
        Inertia.post(route("client.contact.mail"), values);
    }

    return (
        <form onSubmit={handleSubmit} className="form" data-aos="fade-right">
            {/* <div className="f25" style={{ textTransform: "uppercase" }}>
                {__("get_in_touch")}
            </div>
            <p>{__("questions")}</p> */}
            {errors.name && <div>{errors.name}</div>}
            <input
                id="name"
                value={values.name}
                placeholder={`${__("name")} & ${__("surname")}`}
                onChange={handleChange}
                type="text"
            />
            {errors.phone && <div>{errors.phone}</div>}
            <input
                id="phone"
                value={values.phone}
                placeholder={__("phone")}
                onChange={handleChange}
                type="text"
            />
            {errors.email && <div>{errors.email}</div>}
            <input
                id="email"
                value={values.email}
                placeholder={__("email")}
                onChange={handleChange}
                type="email"
            />

            {errors.message && <div>{errors.message}</div>}
            <textarea
                id="message"
                placeholder={__("text_here")}
                onChange={handleChange}
            >
                {values.message}
            </textarea>
            <MainButtonSubmit text="SUBMIT NOW" />
        </form>
    );
};
