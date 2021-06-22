--
-- PostgreSQL database dump
--

-- Dumped from database version 12.7 (Ubuntu 12.7-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.7 (Ubuntu 12.7-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tbl_brand; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_brand (
    brand_id bigint NOT NULL,
    brand_name character varying(255) NOT NULL,
    brand_description text NOT NULL,
    publication_status smallint NOT NULL
);


ALTER TABLE public.tbl_brand OWNER TO postgres;

--
-- Name: tbl_brand_brand_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_brand_brand_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_brand_brand_id_seq OWNER TO postgres;

--
-- Name: tbl_brand_brand_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_brand_brand_id_seq OWNED BY public.tbl_brand.brand_id;


--
-- Name: tbl_category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_category (
    id bigint NOT NULL,
    category_name character varying(100) NOT NULL,
    category_description text NOT NULL,
    publication_status smallint NOT NULL
);


ALTER TABLE public.tbl_category OWNER TO postgres;

--
-- Name: COLUMN tbl_category.publication_status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tbl_category.publication_status IS 'Published=1,Unpublished=0';


--
-- Name: tbl_category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_category_id_seq OWNER TO postgres;

--
-- Name: tbl_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_category_id_seq OWNED BY public.tbl_category.id;


--
-- Name: tbl_customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_customer (
    customer_id bigint NOT NULL,
    customer_name character varying(50) NOT NULL,
    customer_email character varying(100) NOT NULL,
    customer_password character varying(32) NOT NULL,
    customer_address text NOT NULL,
    customer_city character varying(50) NOT NULL,
    customer_zipcode character varying(20) NOT NULL,
    customer_phone character varying(20) NOT NULL,
    customer_country character varying(100) NOT NULL,
    customer_active smallint NOT NULL
);


ALTER TABLE public.tbl_customer OWNER TO postgres;

--
-- Name: COLUMN tbl_customer.customer_active; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tbl_customer.customer_active IS 'Active=1,Unactive=0';


--
-- Name: tbl_customer_customer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_customer_customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_customer_customer_id_seq OWNER TO postgres;

--
-- Name: tbl_customer_customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_customer_customer_id_seq OWNED BY public.tbl_customer.customer_id;


--
-- Name: tbl_option; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_option (
    option_id bigint NOT NULL,
    site_logo character varying(100) NOT NULL,
    site_favicon character varying(100) NOT NULL,
    site_copyright character varying(255) NOT NULL,
    site_contact_num1 character varying(100) NOT NULL,
    site_contact_num2 character varying(100) NOT NULL,
    site_facebook_link character varying(100) NOT NULL,
    site_twitter_link character varying(100) NOT NULL,
    site_google_plus_link character varying(100) NOT NULL,
    site_email_link character varying(100) NOT NULL,
    contact_title character varying(255) NOT NULL,
    contact_subtitle character varying(255) NOT NULL,
    contact_description text NOT NULL,
    company_location character varying(255) NOT NULL,
    company_number character varying(100) NOT NULL,
    company_email character varying(100) NOT NULL,
    company_facebook character varying(100) NOT NULL,
    company_twitter character varying(100) NOT NULL
);


ALTER TABLE public.tbl_option OWNER TO postgres;

--
-- Name: tbl_option_option_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_option_option_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_option_option_id_seq OWNER TO postgres;

--
-- Name: tbl_option_option_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_option_option_id_seq OWNED BY public.tbl_option.option_id;


--
-- Name: tbl_order; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_order (
    order_id bigint NOT NULL,
    customer_id bigint NOT NULL,
    shipping_id bigint NOT NULL,
    payment_id bigint NOT NULL,
    order_total double precision NOT NULL,
    actions character varying(50) DEFAULT 'Pending'::character varying NOT NULL
);


ALTER TABLE public.tbl_order OWNER TO postgres;

--
-- Name: tbl_order_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_order_details (
    order_details_id bigint NOT NULL,
    order_id bigint NOT NULL,
    product_id bigint NOT NULL,
    product_name character varying(255) NOT NULL,
    product_price double precision NOT NULL,
    product_sales_quantity bigint NOT NULL,
    product_image character varying(55) DEFAULT NULL::character varying
);


ALTER TABLE public.tbl_order_details OWNER TO postgres;

--
-- Name: tbl_order_details_order_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_order_details_order_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_order_details_order_details_id_seq OWNER TO postgres;

--
-- Name: tbl_order_details_order_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_order_details_order_details_id_seq OWNED BY public.tbl_order_details.order_details_id;


--
-- Name: tbl_order_order_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_order_order_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_order_order_id_seq OWNER TO postgres;

--
-- Name: tbl_order_order_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_order_order_id_seq OWNED BY public.tbl_order.order_id;


--
-- Name: tbl_payment; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_payment (
    payment_id bigint NOT NULL,
    payment_type character varying(50) NOT NULL,
    actions character varying(50) DEFAULT 'pending'::character varying NOT NULL
);


ALTER TABLE public.tbl_payment OWNER TO postgres;

--
-- Name: tbl_payment_payment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_payment_payment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_payment_payment_id_seq OWNER TO postgres;

--
-- Name: tbl_payment_payment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_payment_payment_id_seq OWNED BY public.tbl_payment.payment_id;


--
-- Name: tbl_product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_product (
    product_id bigint NOT NULL,
    product_title character varying(255) NOT NULL,
    product_short_description text NOT NULL,
    product_long_description text NOT NULL,
    product_image character varying(255) NOT NULL,
    product_price bigint NOT NULL,
    product_quantity bigint NOT NULL,
    product_feature smallint NOT NULL,
    product_category bigint NOT NULL,
    product_brand bigint NOT NULL,
    product_author bigint NOT NULL,
    product_view bigint DEFAULT '0'::bigint NOT NULL,
    published_date timestamp with time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    publication_status smallint NOT NULL
);


ALTER TABLE public.tbl_product OWNER TO postgres;

--
-- Name: tbl_product_product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_product_product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_product_product_id_seq OWNER TO postgres;

--
-- Name: tbl_product_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_product_product_id_seq OWNED BY public.tbl_product.product_id;


--
-- Name: tbl_shipping; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_shipping (
    shipping_id bigint NOT NULL,
    customer_id bigint NOT NULL,
    shipping_name character varying(50) NOT NULL,
    shipping_email character varying(100) NOT NULL,
    shipping_address text NOT NULL,
    shipping_city character varying(100) NOT NULL,
    shipping_country character varying(50) NOT NULL,
    shipping_phone character varying(20) NOT NULL,
    shipping_zipcode character varying(20) NOT NULL
);


ALTER TABLE public.tbl_shipping OWNER TO postgres;

--
-- Name: tbl_shipping_shipping_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_shipping_shipping_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_shipping_shipping_id_seq OWNER TO postgres;

--
-- Name: tbl_shipping_shipping_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_shipping_shipping_id_seq OWNED BY public.tbl_shipping.shipping_id;


--
-- Name: tbl_slider; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_slider (
    slider_id bigint NOT NULL,
    slider_title character varying(255) NOT NULL,
    slider_image character varying(255) NOT NULL,
    slider_link character varying(255) NOT NULL,
    publication_status smallint NOT NULL
);


ALTER TABLE public.tbl_slider OWNER TO postgres;

--
-- Name: tbl_slider_slider_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_slider_slider_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_slider_slider_id_seq OWNER TO postgres;

--
-- Name: tbl_slider_slider_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_slider_slider_id_seq OWNED BY public.tbl_slider.slider_id;


--
-- Name: tbl_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tbl_user (
    user_id bigint NOT NULL,
    user_name character varying(255) NOT NULL,
    user_email character varying(255) NOT NULL,
    user_password character varying(255) NOT NULL,
    user_role smallint NOT NULL,
    created_time timestamp with time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_time timestamp with time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.tbl_user OWNER TO postgres;

--
-- Name: tbl_user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tbl_user_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tbl_user_user_id_seq OWNER TO postgres;

--
-- Name: tbl_user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tbl_user_user_id_seq OWNED BY public.tbl_user.user_id;


--
-- Name: user_role; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_role (
    role_id bigint NOT NULL,
    role_name character varying(255) NOT NULL
);


ALTER TABLE public.user_role OWNER TO postgres;

--
-- Name: user_role_role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_role_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_role_role_id_seq OWNER TO postgres;

--
-- Name: user_role_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_role_role_id_seq OWNED BY public.user_role.role_id;


--
-- Name: tbl_brand brand_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_brand ALTER COLUMN brand_id SET DEFAULT nextval('public.tbl_brand_brand_id_seq'::regclass);


--
-- Name: tbl_category id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_category ALTER COLUMN id SET DEFAULT nextval('public.tbl_category_id_seq'::regclass);


--
-- Name: tbl_customer customer_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_customer ALTER COLUMN customer_id SET DEFAULT nextval('public.tbl_customer_customer_id_seq'::regclass);


--
-- Name: tbl_option option_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_option ALTER COLUMN option_id SET DEFAULT nextval('public.tbl_option_option_id_seq'::regclass);


--
-- Name: tbl_order order_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_order ALTER COLUMN order_id SET DEFAULT nextval('public.tbl_order_order_id_seq'::regclass);


--
-- Name: tbl_order_details order_details_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_order_details ALTER COLUMN order_details_id SET DEFAULT nextval('public.tbl_order_details_order_details_id_seq'::regclass);


--
-- Name: tbl_payment payment_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_payment ALTER COLUMN payment_id SET DEFAULT nextval('public.tbl_payment_payment_id_seq'::regclass);


--
-- Name: tbl_product product_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_product ALTER COLUMN product_id SET DEFAULT nextval('public.tbl_product_product_id_seq'::regclass);


--
-- Name: tbl_shipping shipping_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_shipping ALTER COLUMN shipping_id SET DEFAULT nextval('public.tbl_shipping_shipping_id_seq'::regclass);


--
-- Name: tbl_slider slider_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_slider ALTER COLUMN slider_id SET DEFAULT nextval('public.tbl_slider_slider_id_seq'::regclass);


--
-- Name: tbl_user user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user ALTER COLUMN user_id SET DEFAULT nextval('public.tbl_user_user_id_seq'::regclass);


--
-- Name: user_role role_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_role ALTER COLUMN role_id SET DEFAULT nextval('public.user_role_role_id_seq'::regclass);


--
-- Data for Name: tbl_brand; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_brand (brand_id, brand_name, brand_description, publication_status) FROM stdin;
1	Symphony	                                    Symphony Desc	1
2	Samsung	Samsung desc	1
3	IPhone	IPhone Desc<br>	1
\.


--
-- Data for Name: tbl_category; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_category (id, category_name, category_description, publication_status) FROM stdin;
1	Computer	Computer Desc	1
2	Laptop	Laptop Desc	1
3	Phone	Phone Desc	1
\.


--
-- Data for Name: tbl_customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_customer (customer_id, customer_name, customer_email, customer_password, customer_address, customer_city, customer_zipcode, customer_phone, customer_country, customer_active) FROM stdin;
4	Rostom Ali4444	rostomali4444@gmail.com	21232f297a57a5a743894a0e4a801fc3	Comilla,Bangladesh	Comilla	0152698	014795	Bangladesh	0
5	Rostom Ali4	rostomali4@gmail.com	21232f297a57a5a743894a0e4a801fc3	Comilla,Bangladesh	Comilla	0152698	014795	Bangladesh	0
6	Rostom Ali	rostomali@gmail.com	21232f297a57a5a743894a0e4a801fc3	Comilla,Bangladesh	Comilla	0152698	014795	Bangladesh	0
7	Rostom Ali3	rostomali444@gmail.com	21232f297a57a5a743894a0e4a801fc3	Comilla,Bangladesh	Comilla	0152698	014795	Bangladesh	0
8	Rostom Ali	rostomali44445@gmail.com	21232f297a57a5a743894a0e4a801fc3	Comilla,Bangladesh	Comilla	0152698	014795	Pakistan	0
\.


--
-- Data for Name: tbl_option; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_option (option_id, site_logo, site_favicon, site_copyright, site_contact_num1, site_contact_num2, site_facebook_link, site_twitter_link, site_google_plus_link, site_email_link, contact_title, contact_subtitle, contact_description, company_location, company_number, company_email, company_facebook, company_twitter) FROM stdin;
1	logo1.png	logo2.png	© Right By Rostom Ali	01793589850	01793589850	https://www.facebook.com	https://www.twitter.com	https://www.plus.google.com	https://www.gmail.com	Contact Page	Contact Page Subtitle	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         Contact Page Description\r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                	                                                                                                                                                Here Will Be Company Location<br>                                                                              	01793589850	https://www.gmail.com	https://www.facebook.com	https://www.twitter.com
\.


--
-- Data for Name: tbl_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_order (order_id, customer_id, shipping_id, payment_id, order_total, actions) FROM stdin;
2	4	7	8	11500	Pending
3	4	8	9	81075	Pending
8	4	9	14	402500	Pending
\.


--
-- Data for Name: tbl_order_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_order_details (order_details_id, order_id, product_id, product_name, product_price, product_sales_quantity, product_image) FROM stdin;
1	2	5	Product Five	10000	1	\N
2	3	5	Product Five	10000	4	\N
3	3	3	Product Three	3500	3	\N
4	3	1	Product One	20000	1	\N
5	8	4	Product Four	350000	1	pic3.jpg
\.


--
-- Data for Name: tbl_payment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_payment (payment_id, payment_type, actions) FROM stdin;
1	cashon	pending
2	ssl	pending
3	cashon	pending
4	cashon	pending
5	cashon	pending
6	cashon	pending
7	cashon	pending
8	cashon	pending
9	cashon	pending
10	cashon	pending
11	cashon	pending
12	cashon	pending
13	cashon	pending
14	cashon	pending
\.


--
-- Data for Name: tbl_product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_product (product_id, product_title, product_short_description, product_long_description, product_image, product_price, product_quantity, product_feature, product_category, product_brand, product_author, product_view, published_date, publication_status) FROM stdin;
1	Product One	                                                                                                            There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the                                                                                                	                                                                                                            There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc                                                                                                	feature-pic1.png	20000	50	1	1	2	1	0	2017-11-30 21:24:41+07	1
2	Prduct Two	                                    There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, byThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing orem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etcd humour, or non-characteristic words etc                                	                                    There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etcThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc                                	feature-pic2.jpg	15000	50	1	3	3	1	0	2017-11-30 21:29:04+07	1
3	Product Three	There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. 	                                                                        There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etcThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc                                                                	feature-pic3.jpg	3500	35	1	3	3	1	0	2017-11-30 21:38:25+07	1
4	Product Four	There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. 	                                                                        There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etcThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etcThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc                                                                	pic3.jpg	350000	150	1	2	2	1	0	2017-11-30 21:38:57+07	1
5	Product Five	There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. 	                                    There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etcThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don't look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn't \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc                                	preview-img.jpg	10000	25	1	1	2	1	0	2017-11-30 21:40:34+07	1
\.


--
-- Data for Name: tbl_shipping; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_shipping (shipping_id, customer_id, shipping_name, shipping_email, shipping_address, shipping_city, shipping_country, shipping_phone, shipping_zipcode) FROM stdin;
3	4	Amjad Hossain	amjad@gmail.com	bangladesh	comilla	Bangladesh	555	555
4	4	Amjad Hossain	amjad2@gmail.com	bangladesh	comilla	Pakistan	555	555
5	4	Amjad Hossain	amjad4@gmail.com	bangladesh	comilla	Bangladesh	555	555
6	4	Amjad Hossain	amjad62@gmail.com	bangladesh	comilla	Afghanistan	555	555
7	4	Amjad Hossain	amjad23@gmail.com	bangladesh	comilla	Afghanistan	555	555
8	4	Amjad Hossain	amjad233@gmail.com	bangladesh	comilla	Bangladesh	555	555
9	0	Rostom	rostom@gmail.com	bangladesh	comilla	Bangladesh	555	555
\.


--
-- Data for Name: tbl_slider; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_slider (slider_id, slider_title, slider_image, slider_link, publication_status) FROM stdin;
1	slider	3.jpg	http://localhost/shop/single/5	1
2	slider 2	1.jpg	http://localhost/shop/single/5	1
3	slider 3	2.jpg	http://localhost/shop/add/slider 3	1
\.


--
-- Data for Name: tbl_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tbl_user (user_id, user_name, user_email, user_password, user_role, created_time, updated_time) FROM stdin;
1	admin	admin@gmail.com	21232f297a57a5a743894a0e4a801fc3	1	2017-11-14 01:31:36+07	2017-11-14 01:31:36+07
2	editor	editor@gmail.com	5aee9dbd2a188839105073571bee1b1f	2	2017-11-14 01:31:36+07	2017-11-14 01:31:36+07
3	author	author@gmail.com	02bd92faa38aaa6cc0ea75e59937a1ef	3	2017-11-14 01:31:36+07	2017-11-14 01:31:36+07
\.


--
-- Data for Name: user_role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_role (role_id, role_name) FROM stdin;
1	Admin
2	Author
3	Editor
\.


--
-- Name: tbl_brand_brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_brand_brand_id_seq', 3, true);


--
-- Name: tbl_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_category_id_seq', 3, true);


--
-- Name: tbl_customer_customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_customer_customer_id_seq', 8, true);


--
-- Name: tbl_option_option_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_option_option_id_seq', 1, true);


--
-- Name: tbl_order_details_order_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_order_details_order_details_id_seq', 5, true);


--
-- Name: tbl_order_order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_order_order_id_seq', 8, true);


--
-- Name: tbl_payment_payment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_payment_payment_id_seq', 14, true);


--
-- Name: tbl_product_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_product_product_id_seq', 5, true);


--
-- Name: tbl_shipping_shipping_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_shipping_shipping_id_seq', 9, true);


--
-- Name: tbl_slider_slider_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_slider_slider_id_seq', 3, true);


--
-- Name: tbl_user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tbl_user_user_id_seq', 3, true);


--
-- Name: user_role_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_role_role_id_seq', 3, true);


--
-- Name: tbl_brand idx_17735_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_brand
    ADD CONSTRAINT idx_17735_primary PRIMARY KEY (brand_id);


--
-- Name: tbl_category idx_17744_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_category
    ADD CONSTRAINT idx_17744_primary PRIMARY KEY (id);


--
-- Name: tbl_customer idx_17753_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_customer
    ADD CONSTRAINT idx_17753_primary PRIMARY KEY (customer_id);


--
-- Name: tbl_option idx_17762_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_option
    ADD CONSTRAINT idx_17762_primary PRIMARY KEY (option_id);


--
-- Name: tbl_order idx_17771_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_order
    ADD CONSTRAINT idx_17771_primary PRIMARY KEY (order_id);


--
-- Name: tbl_order_details idx_17778_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_order_details
    ADD CONSTRAINT idx_17778_primary PRIMARY KEY (order_details_id);


--
-- Name: tbl_payment idx_17785_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_payment
    ADD CONSTRAINT idx_17785_primary PRIMARY KEY (payment_id);


--
-- Name: tbl_product idx_17792_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_product
    ADD CONSTRAINT idx_17792_primary PRIMARY KEY (product_id);


--
-- Name: tbl_shipping idx_17803_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_shipping
    ADD CONSTRAINT idx_17803_primary PRIMARY KEY (shipping_id);


--
-- Name: tbl_slider idx_17812_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_slider
    ADD CONSTRAINT idx_17812_primary PRIMARY KEY (slider_id);


--
-- Name: tbl_user idx_17821_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tbl_user
    ADD CONSTRAINT idx_17821_primary PRIMARY KEY (user_id);


--
-- Name: user_role idx_17832_primary; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_role
    ADD CONSTRAINT idx_17832_primary PRIMARY KEY (role_id);


--
-- PostgreSQL database dump complete
--

