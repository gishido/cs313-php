--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: conference; Type: TABLE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE TABLE conference (
    conferenceid integer NOT NULL,
    co_month character varying(20) NOT NULL,
    co_year integer NOT NULL
);


ALTER TABLE conference OWNER TO kmkbjgwzywiltr;

--
-- Name: conference_conferenceid_seq; Type: SEQUENCE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE SEQUENCE conference_conferenceid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE conference_conferenceid_seq OWNER TO kmkbjgwzywiltr;

--
-- Name: conference_conferenceid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER SEQUENCE conference_conferenceid_seq OWNED BY conference.conferenceid;


--
-- Name: login; Type: TABLE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE TABLE login (
    userid integer NOT NULL,
    username character varying(40) NOT NULL,
    password character varying(50) NOT NULL,
    email character varying(150)
);


ALTER TABLE login OWNER TO kmkbjgwzywiltr;

--
-- Name: login_userid_seq; Type: SEQUENCE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE SEQUENCE login_userid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE login_userid_seq OWNER TO kmkbjgwzywiltr;

--
-- Name: login_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER SEQUENCE login_userid_seq OWNED BY login.userid;


--
-- Name: notes; Type: TABLE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE TABLE notes (
    noteid integer NOT NULL,
    userid integer NOT NULL,
    conferenceid integer NOT NULL,
    speakerid integer NOT NULL,
    notebody character varying
);


ALTER TABLE notes OWNER TO kmkbjgwzywiltr;

--
-- Name: notes_noteid_seq; Type: SEQUENCE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE SEQUENCE notes_noteid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE notes_noteid_seq OWNER TO kmkbjgwzywiltr;

--
-- Name: notes_noteid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER SEQUENCE notes_noteid_seq OWNED BY notes.noteid;


--
-- Name: speaker; Type: TABLE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE TABLE speaker (
    speakerid integer NOT NULL,
    firstname character varying(40) NOT NULL,
    lastname character varying(50) NOT NULL,
    title character varying(50)
);


ALTER TABLE speaker OWNER TO kmkbjgwzywiltr;

--
-- Name: speaker_speakerid_seq; Type: SEQUENCE; Schema: public; Owner: kmkbjgwzywiltr
--

CREATE SEQUENCE speaker_speakerid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE speaker_speakerid_seq OWNER TO kmkbjgwzywiltr;

--
-- Name: speaker_speakerid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER SEQUENCE speaker_speakerid_seq OWNED BY speaker.speakerid;


--
-- Name: conference conferenceid; Type: DEFAULT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY conference ALTER COLUMN conferenceid SET DEFAULT nextval('conference_conferenceid_seq'::regclass);


--
-- Name: login userid; Type: DEFAULT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY login ALTER COLUMN userid SET DEFAULT nextval('login_userid_seq'::regclass);


--
-- Name: notes noteid; Type: DEFAULT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY notes ALTER COLUMN noteid SET DEFAULT nextval('notes_noteid_seq'::regclass);


--
-- Name: speaker speakerid; Type: DEFAULT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY speaker ALTER COLUMN speakerid SET DEFAULT nextval('speaker_speakerid_seq'::regclass);


--
-- Data for Name: conference; Type: TABLE DATA; Schema: public; Owner: kmkbjgwzywiltr
--

COPY conference (conferenceid, co_month, co_year) FROM stdin;
1	April	2017
2	October	2016
\.


--
-- Name: conference_conferenceid_seq; Type: SEQUENCE SET; Schema: public; Owner: kmkbjgwzywiltr
--

SELECT pg_catalog.setval('conference_conferenceid_seq', 2, true);


--
-- Data for Name: login; Type: TABLE DATA; Schema: public; Owner: kmkbjgwzywiltr
--

COPY login (userid, username, password, email) FROM stdin;
1	jdawg	con1sk00l	jdawg@jdawg4life.com
\.


--
-- Name: login_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: kmkbjgwzywiltr
--

SELECT pg_catalog.setval('login_userid_seq', 1, true);


--
-- Data for Name: notes; Type: TABLE DATA; Schema: public; Owner: kmkbjgwzywiltr
--

COPY notes (noteid, userid, conferenceid, speakerid, notebody) FROM stdin;
1	1	2	2	yo dawg this dude is awesome!
2	1	1	1	Dis Dieter fellow is off the hook!
3	1	1	1	I love airplanes
4	1	2	2	The law protects us, does not confine us
5	1	2	2	Stop IT!
6	1	1	1	Candy falls from the sky :)
\.


--
-- Name: notes_noteid_seq; Type: SEQUENCE SET; Schema: public; Owner: kmkbjgwzywiltr
--

SELECT pg_catalog.setval('notes_noteid_seq', 6, true);


--
-- Data for Name: speaker; Type: TABLE DATA; Schema: public; Owner: kmkbjgwzywiltr
--

COPY speaker (speakerid, firstname, lastname, title) FROM stdin;
1	Dieter	Uchtdorf	President - 1st Councilor
2	Dallin	Oaks	Apostle
\.


--
-- Name: speaker_speakerid_seq; Type: SEQUENCE SET; Schema: public; Owner: kmkbjgwzywiltr
--

SELECT pg_catalog.setval('speaker_speakerid_seq', 2, true);


--
-- Name: conference conference_pkey; Type: CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY conference
    ADD CONSTRAINT conference_pkey PRIMARY KEY (conferenceid);


--
-- Name: login login_pkey; Type: CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY login
    ADD CONSTRAINT login_pkey PRIMARY KEY (userid);


--
-- Name: notes notes_pkey; Type: CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY notes
    ADD CONSTRAINT notes_pkey PRIMARY KEY (noteid);


--
-- Name: speaker speaker_pkey; Type: CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY speaker
    ADD CONSTRAINT speaker_pkey PRIMARY KEY (speakerid);


--
-- Name: notes notes_conferenceid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY notes
    ADD CONSTRAINT notes_conferenceid_fkey FOREIGN KEY (conferenceid) REFERENCES conference(conferenceid);


--
-- Name: notes notes_speakerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY notes
    ADD CONSTRAINT notes_speakerid_fkey FOREIGN KEY (speakerid) REFERENCES speaker(speakerid);


--
-- Name: notes notes_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kmkbjgwzywiltr
--

ALTER TABLE ONLY notes
    ADD CONSTRAINT notes_userid_fkey FOREIGN KEY (userid) REFERENCES login(userid);


--
-- Name: public; Type: ACL; Schema: -; Owner: kmkbjgwzywiltr
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO kmkbjgwzywiltr;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO kmkbjgwzywiltr;


--
-- PostgreSQL database dump complete
--

