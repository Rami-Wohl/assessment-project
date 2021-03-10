import React from "react";

export const SummaryText = (props) => {

    const hasCompletedAssessment = props.checkCompletion()

    if(hasCompletedAssessment){
        return(
            <React.Fragment>
                <p>Alle vragen zijn ingevuld.</p>
                <p>Indien je iets wilt veranderen, kun je op 'Terug' klikken om terug te keren naar de vragenlijst.</p>
                <p>Als je de vragenlijst wil afronden klik je op 'Verzend' om de antwoorden in te sturen
                    en je resultaat in te zien.</p>
            </React.Fragment>
        )
    } else {
        return(
            <React.Fragment>
                <p>Nog niet alle vragen zijn ingevuld.</p>
                <p>Ga terug naar de vragenlijst en beantwoord alle vragen voordat je de vragenlijst kan verzenden</p>
            </React.Fragment>
        )
    }
}