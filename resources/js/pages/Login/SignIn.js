import React, { useState } from "react";
import { Link, usePage } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";
import {
    MainButton,
    MainButtonSubmit,
} from "../../components/Button/MainButton";
import "./Login.css";
import Layout from "../../Layouts/Layout";

const SignIn = ({ danger }) => {
    const inputs = [
        {
            placeholder: "Name",
            type: "text",
        },
        {
            placeholder: "Password",
            type: "password",
        },
    ];

    const { errors } = usePage().props;

    const [values, setValues] = useState({
        email: "",
        password: "",
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
        Inertia.post(route("client.login"), values);
    }
    return (
        <Layout>
            <form onSubmit={handleSubmit} className="pages login_page signin">
                <div className="wrapper">
                    <div className="login_form">
                        <p>Hello!</p>
                        {danger && <p className="f35">{danger}</p>}
                        <div className="f35">Sign in</div>
                        {errors.email && <div>{errors.email}</div>}
                        <input
                            id="email"
                            value={values.email}
                            onChange={handleChange}
                            type="text"
                            placeholder="name"
                        />
                        {errors.password && <div>{errors.password}</div>}
                        <input
                            id="password"
                            value={values.password}
                            onChange={handleChange}
                            type="password"
                            placeholder="password"
                        />

                        <div className="check">
                            {errors.agree && <div>{errors.agree}</div>}
                            <input type="checkbox" id="stay_in" />
                            <label htmlFor="stay_in">Stay loged in</label>
                        </div>

                        <div className="bottom">
                            <MainButtonSubmit text="send" />
                            {/*<MainButton link="/" text="Register" type={"submit"} />*/}
                            <p>
                                {__("have_no_account")}{" "}
                                <Link href={route("client.signup")}>
                                    {__("sign_up")}
                                </Link>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </Layout>
    );
};

export default SignIn;
