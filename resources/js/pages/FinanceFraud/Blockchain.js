import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { MainButton } from "../../components/Button/MainButton";

import Form, { FormBox } from "../../components/Form/Form";
import "./FinanceFraud.css";
import Layout from "../../Layouts/Layout";
import Partners from "../../components/Partners/Partners";

const Blockchain = () => {
    return (
        <Layout>
            <div className="finance_fraud pages regulations">
                <div className="wrapper flex main">
                    <img className="shape1" src="/img/ff/bg4.png" alt="" />
                    <div className="left">
                        <div className="page_head">
                            <div className="bgd_text">
                                Payment fraud detection and solution
                            </div>
                            <div className="f35">
                                {__("blockchain_monitoring")}
                            </div>
                        </div>
                        <p>{__("blockchain_content_1")}</p>
                        <p>{__("blockchain_content_2")}</p>
                        <Link
                            className="next_page flex centered"
                            href={route("client.entities.index")}
                        >
                            <span>{__("regulation_entities")}</span>
                            <img
                                src="/img/icons/other/arrow-right.svg"
                                alt=""
                            />
                        </Link>
                        <Link
                            className="next_page flex centered reverse"
                            href={route("client.framework.index")}
                        >
                            <span>{__("regulatory_framework")}</span>
                            <img
                                src="/img/icons/other/arrow-right3.svg"
                                alt=""
                            />
                        </Link>
                    </div>
                    <div className="right">
                        <img src="/img/ff/5.png" alt="" />
                    </div>
                </div>
                <Partners />
                <div className="form_section">
                    <div className="wrapper">
                        <FormBox imgSrc="/img/form/1.png" />
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Blockchain;
