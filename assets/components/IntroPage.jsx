import React from "react";
import LinkButton from "./LinkButton";

export const IntroPage = () => (
    <React.Fragment>
        <div className={'intro-text'}>
            <p>Je staat op het punt om de vragenlijst te starten. Een persoonlijkheidsvragenlijst wordt ingezet om een
                indruk te krijgen van de structuur van jouw persoonlijkheid. Het is geen test in de zin dat er goede of
                foute antwoordmogelijkheden zijn.</p>
            <p>Er zijn wel enkele tips die handig zijn bij het invullen van persoonlijkheidsvragenlijsten: </p>
            <ul>
                <li>Neem uitsluitend jezelf als uitgangspunt bij het beantwoorden van alle vragen.</li>
                <li>Ga niet eindeloos wikken en wegen, maar laat elke vraag wel tot je doordringen.</li>
                <li>Neem voor het beantwoorden van de vragen bij voorkeur situaties van de afgelopen twee jaar in
                gedachten.</li>
                <li>Laat eventuele extreme incidenten en periodes uit een ver verleden, of voorvallen uit een vers
                verleden, niet te zwaar doorklinken in jouw antwoorden.</li>
                <li>Grijp voornamelijk terug op voorbeelden uit jouw werkzame leven als je vragen beantwoordt en minder op
                situaties uit jouw privéleven.</li>
            </ul>
            <p>Als je klaar bent met het invullen van de vragenlijst, kun je nog terug naar de beantwoorde vragen, om
                ze na te lezen of eventueel aan te passen.</p>
        </div>
        <div className={'nav-footer'}>
            <LinkButton className={'link-button'} to={'/assessment'}>Start</LinkButton>
        </div>
    </React.Fragment>
)

