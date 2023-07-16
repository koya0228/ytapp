'use strict';
import YouTubePlayer from 'youtube-player';
global.YouTubePlayer = YouTubePlayer;

(() => {
    const stateNames = {
        '-1': 'unstarted',
        0: 'ended',
        1: 'playing',
        2: 'paused',
        3: 'buffering',
        5: 'video cued'
    };

    let videoPlayerDict = {};
    const playerElems = document.querySelectorAll('.ytplayer');
    const playerElemNum = playerElems.length;
    console.log(playerElemNum);

    for (let i=0; i<playerElemNum; i++) {
        const playerElem = playerElems[i];
        const playerId = `player${playerElem.getAttribute('value')}`;
        playerElem.setAttribute('id', playerId);
        if (i == 0) {
            const thisPlayerOuter = document.querySelector(`.ytplayer-container[value="${ playerElem.getAttribute('value') }"`);
            thisPlayerOuter.classList.add('main-player');
        }

        let player;
        // player = YouTubePlayer(playerId);
        // console.log(playerElem.getAttribute('name'));
        player = YouTubePlayer(playerId, {
            videoId: playerElem.getAttribute('name'),
        });

        videoPlayerDict[playerElem.getAttribute('value')] = player;

        let controllerElem = document.querySelector(`.ytplayer-container[value="${ playerElem.getAttribute('value') }"] > .ytplayer-controller`);
        controllerElem.querySelector('.playStop').addEventListener('click', () => {
            playPauseVideo(playerElem.getAttribute('value'));
        });
    }

    console.log(videoPlayerDict);

    function playPauseVideoBasic(playerId, playFlg) {
        console.log(playFlg)
        if (playFlg == 1) {
            videoPlayerDict[playerId].playVideo();
        } else if (playFlg == 0) {
            videoPlayerDict[playerId].pauseVideo();
        }
    }

    async function playPauseVideo(playerId) {
        let playFlg = null;
        let playerState = await videoPlayerDict[playerId].getPlayerState();
        if (playerState == 1) {
            playFlg = 0;  // pause video
        } else if (playerState == 2 || playerState == 5) {
            playFlg = 1;  // play video
        }
        playPauseVideoBasic(playerId, playFlg);
    }

    const allPlayPauseBtn = document.getElementById('allPlayStop');
    allPlayPauseBtn.addEventListener('click', async () => {
        const playerIdList = Object.keys(videoPlayerDict);

        let playFlg = null;
        let playerState = await videoPlayerDict[playerIdList[0]].getPlayerState();
        if (playerState == 1) {
            playFlg = 0;  // pause video
        } else if (playerState == 2 || playerState == 5) {
            playFlg = 1;  // play video
        }

        console.log(playerIdList);

        for (let i=0; i<playerIdList.length; i++) {
            playPauseVideoBasic(playerIdList[i], playFlg);
        }
    });
})();
