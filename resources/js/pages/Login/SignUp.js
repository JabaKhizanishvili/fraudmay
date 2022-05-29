import React, { useState } from "react";
import { Link, usePage } from "@inertiajs/inertia-react";
import {
    MainButton,
    MainButtonSubmit,
} from "../../components/Button/MainButton";
import "./Login.css";
import Layout from "../../Layouts/Layout";
import { Inertia } from "@inertiajs/inertia";

const SignUp = () => {
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
            placeholder: "Email",
            type: "text",
        },
        {
            placeholder: "Phone number",
            type: "tel",
        },
        {
            placeholder: "Password",
            type: "password",
        },
        {
            placeholder: "Confirm password",
            type: "password",
        },
    ];
    const { errors } = usePage().props;

    const [values, setValues] = useState({
        name: "",
        surname: "",
        email: "",
        phone: "",
        password: "",
        password_repeat: "",
        checkbox: "",
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }

    function handleChangeCheckbox(e) {
        const key = e.target.id;
        const value = e.target.checked;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();
        Inertia.post(route("client.signup"), values);
    }
    return (
        <Layout>
            <div className="pages login_page register">
                <form onSubmit={handleSubmit} className="wrapper flex">
                    <div className="login_form">
                        <div style={{ marginBottom: "7px" }} className="f35">
                            Sign up
                        </div>
                        <p style={{ marginBottom: "20px" }}>Get started now</p>
                        {errors.name && <div>{errors.name}</div>}
                        <input
                            id="name"
                            value={values.name}
                            onChange={handleChange}
                            type="text"
                            placeholder="name"
                        />
                        {errors.surname && <div>{errors.surname}</div>}
                        <input
                            id="surname"
                            value={values.surname}
                            onChange={handleChange}
                            type="text"
                            placeholder="surname"
                        />
                        {errors.email && <div>{errors.email}</div>}
                        <input
                            id="email"
                            value={values.email}
                            onChange={handleChange}
                            type="email"
                            placeholder="email"
                        />
                        {errors.phone && <div>{errors.phone}</div>}
                        <input
                            id="phone"
                            value={values.phone}
                            onChange={handleChange}
                            type="phone"
                            placeholder="phone"
                        />
                        {errors.password && <div>{errors.password}</div>}
                        <input
                            id="password"
                            value={values.password}
                            onChange={handleChange}
                            type="password"
                            placeholder="password"
                        />
                        {errors.password_repeat && (
                            <div>{errors.password_repeat}</div>
                        )}
                        <input
                            id="password_repeat"
                            value={values.password_repeat}
                            onChange={handleChange}
                            type="password"
                            placeholder="confirm password"
                        />

                        {/*{inputs.map((input, i) => {*/}
                        {/*    return (*/}
                        {/*        <input*/}
                        {/*            placeholder={input.placeholder}*/}
                        {/*            type={input.type}*/}
                        {/*            key={i}*/}
                        {/*        />*/}
                        {/*    );*/}
                        {/*})}*/}
                        <div className="check">
                            {errors.agree && <div>{errors.agree}</div>}
                            <input
                                type="checkbox"
                                id="agree"
                                onChange={handleChangeCheckbox}
                            />
                            <label htmlFor="checkbox">
                                {__("sign_up_i_am_old")}
                            </label>
                        </div>
                        <div className="bottom">
                            <MainButtonSubmit text="Register" />
                            <p>
                                {__("have_account")}{" "}
                                <Link href={route("client.login")}>
                                    {__("sign_in")}
                                </Link>
                            </p>
                        </div>
                    </div>
                    <img src="/img/other/5.png" alt="" />
                </form>
            </div>
        </Layout>
    );
};

export default SignUp;
