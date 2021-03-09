import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import { Route, Switch, Redirect, BrowserRouter as Router } from 'react-router-dom';
import './styles/app.scss';
import {BasePageLayout} from './components/BasePageLayout'
import Assessment from './components/Assessment'
import {IntroPage} from "./components/IntroPage";
import {ResultsPage} from "./components/ResultsPage";

// general TODO: add Proptypes to components

class App extends Component {
    constructor(props) {
        super(props);

        this.state = {
            assessmentTitle: window.assessmentTitle,
            assessmentCode: window.assessmentCode,
            results: []
        };

        this.updateResults = this.updateResults.bind(this);
    }

    updateResults = (results) => {
        this.setState({
            results: results
        })
    }

    render() {

        return (
                <BasePageLayout title={this.state.assessmentTitle}>
                    <Switch>
                        <Redirect exact from="/" to="/intro" />
                        <Route path="/intro" render={({}) => {
                            return <IntroPage/>;
                        }}/>
                        <Route path="/assessment" render={({}) => {
                            return <Assessment assessmentData={this.state}
                                               updateResults={this.updateResults}
                            />;
                        }}/>
                        <Route path="/results" render={({}) => {
                            return <ResultsPage results={this.state.results}/>;
                        }}/>
                     </Switch>
                </BasePageLayout>
        );
    }

}

ReactDOM.render(
    <Router>
        <App/>
    </Router>,
    document.getElementById('root')
);


