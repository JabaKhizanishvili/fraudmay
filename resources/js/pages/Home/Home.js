import React, { useState } from "react";
import {
    MainButton,
    MainButtonSubmit,
} from "../../components/Button/MainButton";
import {
    financeTabs,
    fraudTabs,
    hero,
    howFoundOut,
    partners,
    questions,
    users,
    whatWeDo,
} from "./HomeData.js";
import "./Home.css";
import Swal from "sweetalert2";

import { Form, FormBox } from "../../components/Form/Form";
import Layout from "../../Layouts/Layout";
import Link from "react-scroll/modules/components/Link";

const Home = ({ alert }) => {
    if (alert) {
        Swal.fire({
            title: alert,
            text: "Do you want to continue",
            icon: "success",
            confirmButtonText: "Cool",
        });
    }
    const [showFraud, setShowFraud] = useState(1);
    const [showFinance, setShowFinance] = useState(2);

    const [showAnswer, setShowAnswer] = useState(0);

    return (
        <Layout>
            <div className="homePage">
                <div className="hero">
                    <div className="wrapper">
                        <div className="flex main">
                            <img src={hero.img} alt="" />
                            <div className="content">
                                <div className="bgd_text">
                                    Payment fraud detection and solution
                                </div>
                                <div className="f35">
                                    {/* {hero.title} */}
                                    We help our clients{" "}
                                    <span style={{ color: "#377DFF" }}>
                                        Recoup
                                    </span>{" "}
                                    their Finances & Portfolios lost to Forex
                                    Trading/Crypto scams
                                </div>
                                <p>{hero.paragraph}</p>
                                <div className="flex">
                                    <Link
                                        className="contact_btn flex centered"
                                        href={route("client.incident.index")}
                                    >
                                        {__("contact_us")}
                                        <img
                                            src="/img/icons/other/arrow-right.svg"
                                            alt=""
                                        />
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div className="partners">
                            <div className="bgd_text">Our partners</div>
                            <div className="grid">
                                {partners.map((partner, i) => {
                                    return (
                                        <div className="item" key={i}>
                                            <img src={partner.logo} alt="" />
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                    </div>
                </div>
                <div className="what_we_do">
                    <img className="abs_bg" src="/img/bgs/2.png" alt="" />
                    <div className="wrapper flex">
                        <FormBox imgSrc="/img/form/1.png" />
                        <div data-aos="fade-up">
                            <div className="f35">
                                What we{" "}
                                <span style={{ color: "#377DFF" }}>DO?</span>
                            </div>
                            <p>{whatWeDo.p1}</p>
                            <p>{whatWeDo.p2}</p>
                            <div className="checks">
                                {whatWeDo.checks.map((check, index) => {
                                    return (
                                        <div key={index} className="item flex">
                                            {" "}
                                            <img
                                                src="/img/icons/other/check.svg"
                                                alt=""
                                            />{" "}
                                            <span> {check}</span>
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                    </div>
                </div>
                <div className="users">
                    <div className="wrapper flex">
                        <div className="content" data-aos="slide-right">
                            <div className="f35" style={{ color: "#377DFF" }}>
                                {users.title}
                            </div>
                            <p>{users.para}</p>
                            <div className="flex">
                                {users.columns.map((item, i) => {
                                    return (
                                        <div className="column" key={i}>
                                            <strong
                                                style={{ color: item.color }}
                                            >
                                                {item.head}
                                            </strong>
                                            <p>{item.light}</p>
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                        <img src="/img/home/6.png" alt="" />
                    </div>
                </div>
                <div className="about_us_section">
                    <div className="wrapper">
                        <div className="f35">
                            How did you find out{" "}
                            <span style={{ color: "#377DFF" }}> About us?</span>
                        </div>
                        <p>
                            your answers help us a lot, so thank you in advance
                        </p>
                        <div className="box">
                            <p>Select one answer</p>
                            {howFoundOut.map((option, index) => {
                                return (
                                    <div
                                        key={index}
                                        className="radio_input flex centered"
                                    >
                                        <input
                                            type="radio"
                                            name="about_us"
                                            id={`about_us_${index}`}
                                        />
                                        <label htmlFor={`about_us_${index}`}>
                                            {option}
                                        </label>
                                    </div>
                                );
                            })}

                            <MainButtonSubmit text="SUBMIT NOW" />
                        </div>
                    </div>
                </div>
                <div className="faq_section">
                    <div className="wrapper">
                        <div className="f35">FAQ</div>
                        {questions.map((item, index) => {
                            return (
                                <div
                                    key={index}
                                    onClick={() => setShowAnswer(index + 1)}
                                    className={
                                        showAnswer === index + 1
                                            ? "question_box open"
                                            : "question_box"
                                    }
                                >
                                    <div className="question flex">
                                        <div className="number">
                                            {index + 1}
                                        </div>
                                        <div>{item.question}</div>
                                        <img
                                            src="/img/icons/other/arrow-down.svg"
                                            alt=""
                                        />
                                    </div>
                                    <p className="answer">{item.answer}</p>
                                </div>
                            );
                        })}
                    </div>
                    <img className="abs_bg" src="/img/bgs/4.png" alt="" />
                </div>
                <div className="home_form">
                    <div className="wrapper">
                        <div className="f35">
                            Still cant find an answer to your question? <br />{" "}
                            feel free to{" "}
                            <span style={{ color: "#377DFF" }}>
                                Get in touch
                            </span>
                        </div>
                        <div className="form_container">
                            <Form />
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Home;
