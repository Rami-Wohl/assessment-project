import React, {Component} from "react";
import ClipLoader from 'react-spinners/ClipLoader'
import {AssessmentSlideshow} from "./AssessmentSlideshow";

class Assessment extends Component {
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            questionList: {},
            count: 0,
            answers: []
        };

        this.updateAnswer = this.updateAnswer.bind(this);
        this.navigateSlideshow = this.navigateSlideshow.bind(this);
    }

    componentDidMount = () => {
        this.getQuestions();
    }

    getQuestions = () => {
        fetch('/api/assessment', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                assessmentCode: this.props.assessmentData.assessmentCode,
            })
        })
            .then(response => response.json())
            .then(result => {
                this.setState({
                    questionList: result,
                    loading: false
                })
            })
            .catch(e => {
                // TODO: build errormessage prompting user to reload/try again
                console.log(e);
                this.setState({...this.state, loading: false});
            });
    };

    navigateSlideshow = (newCount) => {
        this.setState({
            count: newCount
        })
    }

    updateAnswer = (count, value) => {
        let updatedAnswers = this.state.answers.slice()
        updatedAnswers[count] = value;
        this.setState({
            answers: updatedAnswers
        })
    }

    render = () => {
        const loading = this.state.loading;
        const count = this.state.count;
        return (
            <React.Fragment>
                {
                    loading ? (
                        <div className={'spinner-container'}>
                            <ClipLoader loading={loading}/>
                        </div>
                    ) : (
                        <AssessmentSlideshow count={count}
                                             question={this.state.questionList[count]}
                                             total={this.state.questionList.length}
                                             answer={this.state.answers[count] ? this.state.answers[count] : null}
                                             updateAnswer={this.updateAnswer}
                                             navigateSlideshow={this.navigateSlideshow}
                        />
                    )
                }
            </React.Fragment>
        )
    }
}

export default Assessment;