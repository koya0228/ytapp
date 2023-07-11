'use strict';
import YouTubePlayer from 'youtube-player';
global.YouTubePlayer = YouTubePlayer;

(() => {
    let videoPlayerDict = {};
    const playerElems = document.querySelectorAll('.ytplayer');
    const playerElemNum = playerElems.length;
    console.log(playerElemNum);
    for (let i=0; i<playerElemNum; i++) {
        let playerElem = playerElems[i];
        let playerId = `player${playerElem.getAttribute('value')}`;
        playerElem.setAttribute('id', playerId);

        let player;
        // player = YouTubePlayer(playerId);
        // console.log(playerElem.getAttribute('name'));
        player = YouTubePlayer(playerId, {
            videoId: playerElem.getAttribute('name'),
        });

        videoPlayerDict[playerElem.getAttribute('value')] = player;
    }

    console.log(videoPlayerDict);
})();
