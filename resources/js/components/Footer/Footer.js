import React from "react";
import { Link, usePage } from "@inertiajs/inertia-react";
import { navbar } from "../Header/NavData";
import "./Footer.css";

const Footer = () => {
    const { gfacebook, ginstagram, gphone, gaddress, gcity, gcountry } =
        usePage().props;

    const partners = Array.from(Array(8).keys());

    return (
        <div className="footer">
            <div className="wrapper">
                <div className="navbar flex">
                    {navbar.map((nav, i) => {
                        let drop = nav.dropdown;
                        return (
                            <div className="nav_link" key={i}>
                                {drop ? (
                                    <Link
                                        className={drop ? "head op" : "head"}
                                        href={nav.link}
                                        onClick={
                                            drop
                                                ? (e) => e.preventDefault()
                                                : ""
                                        }
                                    >
                                        {nav.name}
                                    </Link>
                                ) : (
                                    <Link
                                        className={drop ? "head op" : "head"}
                                        href={nav.link}
                                    >
                                        {nav.name}
                                    </Link>
                                )}

                                {drop ? (
                                    <div className="dropdown">
                                        {drop.map((drop, i) => {
                                            if (drop) {
                                                return (
                                                    <Link
                                                        key={i}
                                                        href={drop.link}
                                                    >
                                                        {drop.name}
                                                    </Link>
                                                );
                                            }
                                        })}
                                    </div>
                                ) : (
                                    ""
                                )}
                            </div>
                        );
                    })}
                </div>
                <div className="partners_footer flex">
                    <p>
                        Millions of companies of all sizes—from startups to
                        Fortune 500s—use our software and APIs to accept
                        payments, send payouts, and manage their businesses
                        online.
                    </p>
                    <div className="partner_grid">
                        {partners.map((item, index) => {
                            return (
                                <div
                                    key={index}
                                    className="part_img flex centered"
                                >
                                    <img
                                        src={`/img/partners/${item + 1}.png`}
                                        alt=""
                                    />
                                </div>
                            );
                        })}
                    </div>
                </div>
                <div className="contact_info_footer flex">
                    <div className="column">
                        <p>Email address</p>
                        <a href="#">Example@mail.com</a>
                    </div>
                    <div className="column">
                        <p>Phone number</p>
                        <a href="#">+995 311 111 222</a>
                    </div>
                    <div className="column">
                        <p>Address</p>
                        <a href="#">Random Street name #. London, UK.</a>
                    </div>
                    <div className="column">
                        <div className="sm flex">
                            <a href="#">
                                <img src="/img/icons/footer/fb.svg" alt="" />
                            </a>
                            <a href="#">
                                <img src="/img/icons/footer/ig.svg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Footer;
