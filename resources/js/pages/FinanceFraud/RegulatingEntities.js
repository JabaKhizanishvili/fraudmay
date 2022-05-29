import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { FormBox } from "../../components/Form/Form";
import "./FinanceFraud.css";
import Layout from "../../Layouts/Layout";
import Partners from "../../components/Partners/Partners";

const RegulatingEntities = () => {
    return (
        <Layout>
            <div className="finance_fraud pages regulations">
                <div className="wrapper flex main">
                    <img className="shape1" src="/img/ff/bg4.png" alt="" />
                    <div className="left">
                        <div className="page_head">
                            <p>{__("regulatory_framework")}</p>
                            <div className="f35">
                                {__("regulating_entities")}
                            </div>
                        </div>
                        <p>{__("entities_content_1")}</p>
                        <p>{__("entities_content_2")}</p>

                        <Link
                            className="next_page flex centered"
                            href={route("client.framework.index")}
                        >
                            <span> {__("regulatory_framework")}</span>
                            <img
                                src="/img/icons/other/arrow-right.svg"
                                alt=""
                            />
                        </Link>
                        <Link
                            className="next_page flex centered reverse"
                            href={route("client.blockchain.index")}
                        >
                            <span>{__("blockchain_monitoring")}</span>
                            <img
                                src="/img/icons/other/arrow-right3.svg"
                                alt=""
                            />
                        </Link>
                    </div>
                    <div className="right">
                        <img src="/img/ff/6.png" alt="" />
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

export default RegulatingEntities;
